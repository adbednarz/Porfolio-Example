CREATE TABLE Users(
    User TEXT PRIMARY KEY,
    Passwd TEXT,
    Email TEXT
);

CREATE TABLE Comments(
    Comment TEXT,
    ProjectName TEXT,
    Author TEXT
);

CREATE TABLE IP(
    UserIP TEXT PRIMARY KEY,
    AccessDate TEXT
);

sudo chmod -R 777 /var/www/html
sudo chown www-data html/
sudo chown www-data database.db