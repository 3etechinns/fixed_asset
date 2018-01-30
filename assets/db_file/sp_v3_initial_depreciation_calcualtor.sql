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
