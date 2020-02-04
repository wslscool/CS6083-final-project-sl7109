#uid , name , email , address , profileid , hoodid , blockid
CREATE TABLE IF NOT EXISTS `User`(
   `uid` INT UNSIGNED AUTO_INCREMENT,
   `user_name` VARCHAR(40) NOT NULL,
   `email` VARCHAR(40) NOT NULL,
    `address_city_id` INT NOT NULL,
    `address_street_id` INT NOT NULL,
    `profile_id` INT NOT NULL DEFAULT -1,
    `hood_id` INT NOT NULL DEFAULT -1,
    `block_id` INT NOT NULL DEFAULT -1,
    `password` VARCHAR(80) NOT NULL,
    
   PRIMARY KEY ( `uid` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Message(mid , type , sender , receiver , title , body , timestamp , location , status)
CREATE TABLE IF NOT EXISTS `Message`(
   `mid` INT UNSIGNED AUTO_INCREMENT,
   `type` INT NOT NULL,
   `sender_id`  INT NOT NULL,
    `receiver_id` INT NOT NULL,
    `title` VARCHAR(40) ,
    `body` VARCHAR(200) ,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `location` bool ,
   `status`  INT NOT NULL,
   PRIMARY KEY ( `mid` )
   foreign key(sender_id)  REFERENCES User(uid)
   foreign key(receiver_id)  REFERENCES User(uid)
   ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Profile(pid , uid , photopath , self introduce , family introduce)
CREATE TABLE IF NOT EXISTS `Profile`(
   `pid` INT UNSIGNED AUTO_INCREMENT,
   `` INT NOT NULL,
    `photopath` VARCHAR(200) NOT NULL DEFAULT "***",
    `self_intro` VARCHAR(200) NOT NULL,
    `family_intro` VARCHAR(200) NOT NULL,
   PRIMARY KEY ( `pid` )
    foreign key(uid)  REFERENCES User(uid)
    ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER  TABLE Relation_List CHANGE  rid;
# Relation_List(rid , type , user1id , user2id , request)
CREATE TABLE IF NOT EXISTS `Relation_List`(
   `rid` INT UNSIGNED AUTO_INCREMENT,
   `type` INT NOT NULL,
   `user1_id` INT NOT NULL,
   `user2_id` INT NOT NULL,
   `request` INT NOT NULL  DEFAULT -1,
   PRIMARY KEY ( `rid` )
    foreign key(user1_id)  REFERENCES User(uid)
   foreign key(user2_id)  REFERENCES User(uid)
   ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Hood_and_Block(hbid , hid , bid)
CREATE TABLE IF NOT EXISTS `Hood_and_Block`(
   `hbid` INT UNSIGNED AUTO_INCREMENT,
   `hid` INT NOT NULL,
    `bid` INT NOT NULL,
   PRIMARY KEY ( `hbid` )
    foreign key(hid)  REFERENCES Hood(hid)
   foreign key(bid)  REFERENCES Block(bid)
   ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Block_and_Street(bsid,cid,sid)
CREATE TABLE IF NOT EXISTS `Block_and_Street`(
   `bsid` INT UNSIGNED AUTO_INCREMENT,
   `bid` INT NOT NULL,
    `sid` INT NOT NULL,
   PRIMARY KEY ( `cbid` )
    foreign key(sid)  REFERENCES Street(sid)
   foreign key(bid)  REFERENCES Block(bid)
    ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Hood(hid,hname)
CREATE TABLE IF NOT EXISTS `Hood`(
   `hid` INT UNSIGNED AUTO_INCREMENT,
    `hname` VARCHAR(40) NOT NULL,
   PRIMARY KEY ( `hid` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Block(bid,bname)
CREATE TABLE IF NOT EXISTS `Block`(
   `bid` INT UNSIGNED AUTO_INCREMENT,
    `bname` VARCHAR(40) NOT NULL,
   PRIMARY KEY ( `bid` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#City(cid,cname)
CREATE TABLE IF NOT EXISTS `City`(
   `cid` INT UNSIGNED AUTO_INCREMENT,
    `cname` VARCHAR(40) NOT NULL,
   PRIMARY KEY ( `cid` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Street(sid,sname)
CREATE TABLE IF NOT EXISTS `Street`(
   `sid` INT UNSIGNED AUTO_INCREMENT,
    `sname` VARCHAR(40) NOT NULL,
   PRIMARY KEY ( `sid` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;