CREATE TABLE gr_purchased_packages (
    purchase_id BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    package_id int NOT NULL,
    package_price DECIMAL(10, 2) NOT NULL,
    purchase_date DATETIME NOT NULL,
    PRIMARY KEY (purchase_id),
    FOREIGN KEY (user_id) REFERENCES gr_site_users(user_id),
    FOREIGN KEY (package_id) REFERENCES gr_coin_packages(package_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;