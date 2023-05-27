CREATE TABLE gr_ratings (
  id INT NOT NULL AUTO_INCREMENT,
  rated_user_id INT NOT NULL,
  rating_user_id INT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY unique_rating (rated_user_id, rating_user_id)
);
