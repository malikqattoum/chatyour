CREATE TABLE chatyour_toto.gr_coin_remove (
  coin_remove_id INT AUTO_INCREMENT PRIMARY KEY,
  removed_user_id bigint,
  removed_by_user_id bigint,
  amount INT NOT NULL,
  reason TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (removed_user_id) REFERENCES gr_site_users(user_id),
  FOREIGN KEY (removed_by_user_id) REFERENCES gr_site_users(user_id)
);