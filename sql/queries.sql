CREATE TABLE contacts
(
    id   integer primary key autoincrement,
    name text
);

CREATE TABLE friends
(
    contact_id integer,
    friend_id  integer,
    FOREIGN KEY (contact_id) REFERENCES contacts (id) ON DELETE CASCADE
);

SELECT id, name, count(friend_id)
FROM contacts
         INNER JOIN friends f on contacts.id = f.contact_id
GROUP BY id
HAVING COUNT(friend_id) > 5;