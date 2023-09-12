ALTER TABLE gr_coins
MODIFY COLUMN transaction_type ENUM('send', 'receive', 'grant', 'remove', 'purchase') NOT NULL;
