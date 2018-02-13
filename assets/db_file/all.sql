DROP PROCEDURE IF EXISTS checkAssetAvailability;
CREATE PROCEDURE checkAssetAvailability(IN id INT(22))
  BEGIN

    SELECT
      status,
      greatest(max(date_trasferred), max(date_returned))
    FROM ass_track
    WHERE Asset_ass_id = id;
  END;

CALL checkAssetAvailability(7);

DROP PROCEDURE IF EXISTS recentAssetTrack;
CREATE PROCEDURE recentAssetTrack()

  BEGIN
    SELECT
      t.ass_track_id,
      t.Asset_ass_id,
      t.reciver_full_name,
      greatest(max(t.date_returned), max(t.date_trasferred)) AS recentDate,
      t.ass_emp_id,
      a.ass_serial_number,
      a.ass_name
    FROM ass_track AS t
      LEFT JOIN asset AS a
      ON t.Asset_ass_id=a.ass_id
    GROUP BY Asset_ass_id;
  END;
SELECT
  t.ass_track_id,
  t.Asset_ass_id,
  t.reciver_full_name,
  greatest(max(t.date_returned), max(t.date_trasferred)) AS recentDate,
  t.ass_emp_id,
  a.ass_serial_number
FROM ass_track AS t
  LEFT JOIN asset AS a
    ON t.Asset_ass_id=a.ass_id
GROUP BY Asset_ass_id;



CALL recentAssetTrack();
SELECT @@sql_mode;

SET sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));


DROP PROCEDURE IF EXISTS assetTrackDetailById;
CREATE PROCEDURE `assetTrackDetailById`(IN assId INT(22))
  BEGIN
    SELECT *
    FROM ass_track
    WHERE asset_ass_id = assId;
  END;

DROP PROCEDURE IF EXISTS assetTrackDetailById;
CREATE PROCEDURE assetTrackDetailById(IN assId INT(22))
  BEGIN
    SELECT GREATEST(max(date_returned), max(date_trasferred))
    FROM ass_track
    WHERE asset_ass_id = assId;
  END;

CALL assetTrackDetailById(7);
SELECT *
FROM ass_track
WHERE Asset_ass_id = 7;

DROP PROCEDURE IF EXISTS assetCountBasedOnCategory;
CREATE PROCEDURE assetCountBasedOnCategory()
  BEGIN
    SELECT
      c.cat_id,
      c.cat_code,
      c.cat_name,
      c.depriciation_life,
      COUNT(a.ass_cat_id) AS quantity
    FROM asset_category AS c
      LEFT JOIN asset AS a ON c.cat_id = a.ass_cat_id
    GROUP BY c.cat_id;
  END;

CREATE PROCEDURE assetCounterByStatus()
  BEGIN
    SELECT
      s.status,
      count(a.status_status_id) AS total
    FROM status AS s
      LEFT JOIN asset AS a ON s.status_id = a.status_status_id
    GROUP BY s.status_id;

  END;

CALL assetCounterByStatus();

DROP PROCEDURE IF EXISTS initial_depreciation;
#when asset automatically .............................................
CREATE PROCEDURE initial_depreciation(IN ass_cat_id INT, IN unitPrice DOUBLE, IN depDate VARCHAR(23), IN assetId INT)
  BEGIN
    DECLARE depration INT;
    DECLARE depAmount DOUBLE;

    SELECT depriciation_life
    INTO depration
    FROM asset_category
    WHERE cat_id = ass_cat_id;
    SET depAmount = unitPrice / depration;
    INSERT INTO depreciation (dep_date, dep_amount, dep_status, dep_description, dep_commnet, asset_ass_id, book_value, accumulative_value)
    VALUES (depDate, depAmount, 'active', 'd', 'd', assetId, unitPrice, 0);
  END;
#   end...................................

DROP PROCEDURE IF EXISTS depreciationDetailById;
CREATE PROCEDURE `depreciationDetailById`(IN assId INT(22))
  BEGIN
    SELECT *
    FROM depreciation
    WHERE asset_ass_id = assId;
  END;

CALL depreciationDetailById(1);

# .......................................

CALL initial_depreciation(4, 160000, '2017-06-04', 1);
CALL initial_depreciation(4, 160000, 5, 2);
CALL initial_depreciation(4, 160000, 5, 3);
CALL initial_depreciation(4, 160000, 5, 4);
# .................................
DELETE FROM depreciation;

DROP PROCEDURE IF EXISTS depreciation_calculator;
# depreciation calculator..........................................
CREATE PROCEDURE depreciation_calculator(IN deprcesionDate INT)
  BEGIN
    DECLARE acc DOUBLE;
    DECLARE diff INT;
    DECLARE currentDate DATE;
    DECLARE depDate VARCHAR(12);
    DECLARE dep DOUBLE;
    DECLARE bookValue DOUBLE;
    DECLARE assetId INT;
    DECLARE depStatus VARCHAR(12);
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE emp_cursor CURSOR FOR SELECT
                                    dep_date,
                                    dep_amount,
                                    dep_status,
                                    asset_ass_id,
                                    book_value,
                                    accumulative_value
                                  FROM depreciation;
    -- 2. Declare NOT FOUND handler
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    -- 3. Open the cursor
    OPEN emp_cursor;
    L: LOOP
      -- 4. Fetch next element
      FETCH emp_cursor
      INTO depDate, dep, depStatus, assetId, bookValue, acc;
      -- Handler will set finished = 1 if cursor is empty
      IF finished = 1
      THEN
        LEAVE L;
      END IF;
      SET currentDate = DATE(now());
      SET diff := TIMESTAMPDIFF(MONTH, depDate, currentDate);


      IF diff > 12 && diff <= 13 && bookValue > 1 && depStatus = 'depreciated'
      THEN
        SET depDate = currentDate;
        SET dep = dep;
        SET acc = acc + dep;
        SET bookValue = bookValue - dep;
        IF bookValue = 0 && bookValue<1
        THEN
          SET depStatus = 'depreciated';
          UPDATE asset
          SET status_status_id = 7
          WHERE ass_id = asset_ass_id;
        END IF;
        INSERT INTO depreciation (dep_date, dep_amount, dep_status, dep_description, dep_commnet, asset_ass_id, book_value, accumulative_value)
        VALUES (depDate, dep, depStatus, 1, 1, assetId, bookValue, acc);

      END IF;
    END LOOP;
    -- 5. Close cursor when done
    CLOSE emp_cursor;
    SELECT diff;
  END;
# end of PROCEDURE ..............................................
#------------------------------

SELECT *
FROM status;
SELECT *
FROM depreciation;

SELECT *
FROM depreciation;

SELECT *
FROM ass_track;
CALL depreciationDetailById(1);

DELETE FROM depreciation;

# data for testing.........................assume s as date

CALL depreciation_calculator(5);
CALL depreciation_calculator(4);
CALL depreciation_calculator(3);
CALL depreciation_calculator(2);
CALL depreciation_calculator(1);

# end....................................
DELETE FROM asset
WHERE ass_id = 17;

SELECT *
FROM ass_track
WHERE Asset_ass_id = 7;
SELECT *
FROM depreciation;

SELECT *
FROM depreciation;

DELETE FROM asset;

SELECT *
FROM asset;
SELECT month(ass_date_sold)
FROM asset;
SELECT *
FROM depreciation;

SELECT TIMESTAMPDIFF(MONTH, '2016-05-05', DATE(now()));
DELETE FROM depreciation;

SELECT *
FROM depreciation;

ALTER TABLE depreciation
  AUTO_INCREMENT = 1;

DELETE FROM depreciation;



ALTER TABLE asset
  AUTO_INCREMENT = 1;
DELETE FROM asset;
DELETE FROM depreciation;


