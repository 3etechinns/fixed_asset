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


      IF diff > 12 && diff <= 13 && bookValue > 0
      THEN
        SET depDate = currentDate;
        SET dep = dep;
        SET acc = acc + dep;
        SET bookValue = bookValue - dep;
        IF bookValue = 0
        THEN
          SET depStatus = 'depreciated';
        END IF;
        INSERT INTO depreciation (dep_date, dep_amount, dep_status, dep_description, dep_commnet, asset_ass_id, book_value, accumulative_value)
        VALUES (depDate, dep, depStatus, 1, 1, assetId, bookValue, acc);
      END IF;
    END LOOP;
    -- 5. Close cursor when done
    CLOSE emp_cursor;
    SELECT diff;
  END;
