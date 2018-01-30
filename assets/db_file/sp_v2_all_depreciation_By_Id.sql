CREATE PROCEDURE depreciationDetailById(IN assId INT(22))
  BEGIN
    SELECT *
    FROM depreciation
    WHERE asset_ass_id = assId;
  END;
