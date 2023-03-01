CREATE FUNCTION get_longest_movie() RETURNS VARCHAR(255)
BEGIN
  DECLARE longest_movie VARCHAR(255);
  SELECT name INTO longest_movie FROM movie ORDER BY length DESC LIMIT 1;
  RETURN longest_movie;
END;

SELECT get_longest_movie();

CREATE PROCEDURE remove_unused_categories()
BEGIN
  DECLARE category_count INT;
  DECLARE category_id INT;
  
  -- Loop through each category
  SELECT COUNT(*) INTO category_count FROM category;
  SET category_id = 1;
  
  WHILE category_id <= category_count DO
    -- Check if the category is used by any movie
    IF NOT EXISTS (SELECT * FROM m2c2a2aw WHERE category_id = category_id) THEN
      -- If not, delete the category
      DELETE FROM category WHERE cid = category_id;
    END IF;
    
    SET category_id = category_id + 1;
  END WHILE;
  
END;

CALL remove_unused_categories();
