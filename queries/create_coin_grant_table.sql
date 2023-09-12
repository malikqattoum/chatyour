CREATE TABLE gr_coin_grant (
  coin_grant_id INT AUTO_INCREMENT PRIMARY KEY,
  granted_user_id bigint,
  granted_by_user_id bigint,
  amount INT NOT NULL,
  reason TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (granted_user_id) REFERENCES gr_site_users(user_id),
  FOREIGN KEY (granted_by_user_id) REFERENCES gr_site_users(user_id)
);
