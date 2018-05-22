-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: 10.138.80.31
-- Generation Time: May 16, 2014 at 03:37 PM
-- Server version: 5.1.41-log
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scratchcards`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `activation_number`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `activation_number`(IN `a1` VARCHAR(50), IN `a2` VARCHAR(50), IN `a3` VARCHAR(50))
BEGIN

DECLARE activno VARCHAR(50);
DECLARE oname VARCHAR(50);

if a1 != 0  then


SELECT CONCAT(DATE_FORMAT(NOW(),"%Y%m%d" ),'-',a1,'-',(select max(id) from activationno)) into activno;

insert into activationno(actno,dealerid,creation_date,creation_time,othername,userid) values (activno,a1,CURDATE(),CURTIME(),a2,a3);

end if;

END$$

DROP PROCEDURE IF EXISTS `activ_check`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `activ_check`(IN `a1` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  sf  VARCHAR(255);
DECLARE  l_activ_no  VARCHAR(50);
DECLARE  file_name  VARCHAR(255);
DECLARE  l_last_row_fetched  INT;

DECLARE data1 CURSOR FOR select concat('select batch_number, min(serial_number), max(serial_number),state, count(*) from recharge_card where batch_number =' ,batch,' and serial_number between ',start_serialnumber,' and ',end_serialnumber,' group by batch_number,state;') as q1  from cardsrequest1 where act_id=a1;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;

select actno into l_activ_no from activationno where id =a1;

SET l_last_row_fetched=0;

truncate table activ_check_tmp;

OPEN data1;
 data1_cursor: LOOP
    FETCH data1 INTO sf;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
        insert into activ_check_tmp(check_query,activid) values(sf,a1);
	END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;

set @sql_text =concat("select check_query from activ_check_tmp into outfile 'C:/xampp/htdocs/scratchcards/checking/",l_activ_no, ".sql'");

PREPARE stmt2 FROM @sql_text;
EXECUTE stmt2;
DEALLOCATE PREPARE stmt2;

truncate table activ_check_tmp;

update activationno set status=1 where id=a1;

END$$

DROP PROCEDURE IF EXISTS `checking_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `checking_data`(IN `f1` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  l_batch  VARCHAR(6);
DECLARE  l_sn1  VARCHAR(6);
DECLARE  l_diff  VARCHAR(6);
DECLARE  l_activid  INT;
DECLARE  l_rst  VARCHAR(6);
DECLARE  l_last_row_fetched  INT;



DECLARE data1 CURSOR FOR select batch,start_serialnumber,(end_serialnumber -start_serialnumber) as diff,act_id from cardsrequest1 where act_id=f1;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;



SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP
     FETCH data1 INTO l_batch,l_sn1,l_diff,l_activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
	      
	     SET l_id =0;
	     WHILE l_id  <= l_diff DO
	       SET l_rst = l_sn1 + l_id;
           insert into check_tmp(batch,serialnumber,activid) values(l_batch,l_rst,l_activid);
	  
	       SET  l_id = l_id + 1;
		 
        END WHILE;
	  
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;
END$$

DROP PROCEDURE IF EXISTS `concat_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `concat_data`(IN `f1` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  l_batch  VARCHAR(6);
DECLARE  l_sn1  VARCHAR(6);
DECLARE  l_sn2  VARCHAR(6);
DECLARE  l_diff  VARCHAR(6);
DECLARE  l_activid  INT;
DECLARE  l_activ_no  VARCHAR(50);
DECLARE  l_rst  VARCHAR(6);
DECLARE  l_num  VARCHAR(6);
DECLARE  p1  VARCHAR(255);
DECLARE  p2  VARCHAR(255);
DECLARE  p3  VARCHAR(255);
DECLARE  p4  VARCHAR(255);
DECLARE  sf  VARCHAR(255);
DECLARE  file_name  VARCHAR(255);
DECLARE  l_last_row_fetched  INT;



DECLARE data1 CURSOR FOR select batch,start_serialnumber,end_serialnumber,(end_serialnumber -start_serialnumber) as diff,act_id from cardsrequest1 where act_id=f1;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;

select actno into l_activ_no from activationno where id =f1;
select ',SERVICE=PPS,OBJECT=RECH_CARD,CARD_BATCH=' into p1;
select ',CARD_SERIAL=' into p2;
select ',CARD_STATE=Active' into p3;
select concat(',SHIP_DATE=',curdate()) into p4;


SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP
     FETCH data1 INTO l_batch,l_sn1,l_sn2,l_diff,l_activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
	      
	     SET l_id =0;
	     WHILE l_id  <= l_diff DO
	       SET l_rst = l_sn1 + l_id;
		    SET l_num = l_id  + 1;
           select concat('M',' ',l_num,p1,l_batch,p2,l_rst,p3,p4) into sf;
           insert into hia_tmp(hias,activid) values(sf,l_activid);
	        #insert into check_tmp(batch,serialnumber,activid,ship_date) values(l_batch,l_rst,l_activid,curdate());
	        
	       SET  l_id = l_id + 1;
		 
        END WHILE;
	  
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;

set @sql_text =concat("select hias from hia_tmp into outfile 'C:/xampp/htdocs/scratchcards/output/",l_activ_no, ".hia'");

PREPARE stmt2 FROM @sql_text;
EXECUTE stmt2;
DEALLOCATE PREPARE stmt2;

truncate table hia_tmp;

update activationno set hiacreated=1 where id=f1;

END$$

DROP PROCEDURE IF EXISTS `concat_databatch`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `concat_databatch`(IN `f2` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  l_batch  VARCHAR(6);
DECLARE  l_sn1  VARCHAR(6);
DECLARE  l_sn2  VARCHAR(6);
DECLARE  l_diff  VARCHAR(6);
DECLARE  l_activid  INT;
DECLARE  l_rst  VARCHAR(6);
DECLARE  l_num  VARCHAR(6);
DECLARE  p1  VARCHAR(255);
DECLARE  p2  VARCHAR(255);
DECLARE  p3  VARCHAR(255);
DECLARE  p4  VARCHAR(255);
DECLARE  sf  VARCHAR(255);
DECLARE  l_last_row_fetched  INT;



DECLARE data1 CURSOR FOR select batch,start_serialnumber,end_serialnumber,(end_serialnumber -start_serialnumber) as diff,act_id from cardsrequest1 where id=f2;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;


select ',SERVICE=PPS,OBJECT=RECH_CARD,CARD_BATCH=' into p1;
select ',CARD_SERIAL=' into p2;
select ',CARD_STATE=Active' into p3;
select concat(',SHIP_DATE=',curdate()) into p4; 


SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP
     FETCH data1 INTO l_batch,l_sn1,l_sn2,l_diff,l_activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
	      
	     SET l_id =0;
	     WHILE l_id  <= l_diff DO
	       SET l_rst = l_sn1 + l_id;
		    SET l_num = l_id  + 1;
           select concat('M',' ',l_num,p1,l_batch,p2,l_rst,p3,p4) into sf;
           insert into hia_tmp(hias,activid) values(sf,l_activid);
	  
	       SET  l_id = l_id + 1;
		 
        END WHILE;
	  
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;
END$$

DROP PROCEDURE IF EXISTS `create_ccbatch`$$
CREATE DEFINER=`root`@`%` PROCEDURE `create_ccbatch`(IN `f1` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  l_batch  VARCHAR(6);
DECLARE  l_sn1  VARCHAR(6);
DECLARE  l_sn2  VARCHAR(6);
DECLARE  l_activid  INT;
DECLARE  l_activ_no  VARCHAR(50);
DECLARE  p1  VARCHAR(255);
DECLARE  p2  VARCHAR(255);
DECLARE  sf  VARCHAR(2000);
DECLARE  l_last_row_fetched  INT;



DECLARE data1 CURSOR FOR select batch,start_serialnumber,end_serialnumber,act_id from cardsrequest1 where act_id=f1;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;

select actno into l_activ_no from activationno where id =f1;
select 'Active' into p1;
select concat(curdate(),'T00:00:00.0000000+02:00') into p2;


SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP 
     FETCH data1 INTO l_batch,l_sn1,l_sn2,l_activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;

      select xml_tag('ModifyVoucher',null,null,concat(xml_tag('batchNumber',l_batch,null,null),xml_tag('newStateName',p1,null,null),xml_tag('startSerial',l_sn1,null,null),xml_tag('endSerial',l_sn2,null,null),xml_tag('shipDate',p2,null,null))) into sf;    
		insert into hia_tmp(hias,activid) values(sf,l_activid);
	      
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;

set @header='<Batch CommandType="Voucher">';
set @footer='</Batch>';
set @actid = f1;

set @sql_text =concat("select @header  union select hias from hia_tmp where activid=@actid union select @footer into outfile 'C:/xampp/htdocs/scratchcards/output/",l_activ_no, ".ccbatch'");

PREPARE stmt2 FROM @sql_text;
EXECUTE stmt2;
DEALLOCATE PREPARE stmt2;

truncate table hia_tmp;

#update activationno set hiacreated=1 where id=f1;

END$$

DROP PROCEDURE IF EXISTS `generate_xml`$$
CREATE DEFINER=`root`@`%` PROCEDURE `generate_xml`(IN `f1` INT)
BEGIN
DECLARE  l_id  INT;
DECLARE  l_batch  VARCHAR(6);
DECLARE  l_sn1  VARCHAR(6);
DECLARE  l_sn2  VARCHAR(6);
DECLARE  l_diff  VARCHAR(6);
DECLARE  l_activid  INT;
DECLARE  l_activ_no  VARCHAR(50);
DECLARE  l_rst  VARCHAR(6);
DECLARE  l_num  VARCHAR(6);
DECLARE  p1  VARCHAR(255);
DECLARE  p2  VARCHAR(255);
DECLARE  p3  VARCHAR(255);
DECLARE  p4  VARCHAR(255);
DECLARE  sf  VARCHAR(2000);
DECLARE  file_name  VARCHAR(255);
DECLARE  l_last_row_fetched  INT;

DECLARE  f_l_id  INT;
DECLARE  f_nb_rec  INT;
DECLARE  f_rec_i  INT;
DECLARE  f_rec_j  INT;



DECLARE data1 CURSOR FOR select batch,start_serialnumber,end_serialnumber,(end_serialnumber -start_serialnumber) as diff,act_id from cardsrequest1 where act_id=f1;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;

select actno into l_activ_no from activationno where id =f1;
select 'Active' into p3;
select curdate() into p4;


SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP 
     FETCH data1 INTO l_batch,l_sn1,l_sn2,l_diff,l_activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
	      
	     SET l_id =0;
	     WHILE l_id  <= l_diff DO
	       SET l_rst = l_sn1 + l_id;
		    SET l_num = l_id  + 1;
		     select xml_tag('modifyvoucher',null,null,concat(xml_tag('batchnumber',l_batch,null,null),xml_tag('newstatename',p3,null,null),xml_tag('startserial',l_rst,null,null),xml_tag('shipdate',p4,null,null))) into sf;
           insert into xml_tmp(contents,activid) values(sf,l_activid);
	   
	       SET  l_id = l_id + 1;
		 
        END WHILE;
	     
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;
   

   
select ceil((count(id)/2000)) into f_nb_rec from xml_tmp where activid=f1;

set f_l_id=1;
set f_rec_i = 1;
set f_rec_j = 2000;

WHILE f_l_id <= f_nb_rec DO

   select concat(l_activ_no,"_",f_l_id) into file_name;

   set @sql_text =concat("select '<batch>' union select contents from xml_tmp where activid=",f1," and id between ",f_rec_i," and ",f_rec_j, " union select '</batch>' into outfile 'C:/xampp/htdocs/scratchcards/output/",file_name, ".xml'");

   PREPARE stmt2 FROM @sql_text;
   EXECUTE stmt2;
   DEALLOCATE PREPARE stmt2;

   set f_l_id = f_l_id + 1;
   set f_rec_i = f_rec_i + 2000;
   set f_rec_j = f_rec_j + 2000;
   
END WHILE; 
#truncate table xml_tmp;

#update activationno set hiacreated=1 where id=f1;

END$$

DROP PROCEDURE IF EXISTS `load_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `load_data`(IN `c1` VARCHAR(50), IN `c2` VARCHAR(50), IN `c3` VARCHAR(50), IN `c4` VARCHAR(50), IN `c5` VARCHAR(50), IN `c6` VARCHAR(50), IN `c7` VARCHAR(50), IN `c8` VARCHAR(50), IN `c9` VARCHAR(50), IN `c10` VARCHAR(50), IN `c11` VARCHAR(50), IN `c13` VARCHAR(50), IN `c14` VARCHAR(50), IN `c15` VARCHAR(50))
BEGIN

DECLARE actnumber INT(50);
DECLARE b1 INT(50);
DECLARE b2 INT(50);
DECLARE b3 INT(50);
DECLARE b4 INT(50);
DECLARE b5 INT(50);

DECLARE e1 VARCHAR(6);
DECLARE e2 VARCHAR(6);
DECLARE e3 VARCHAR(6);
DECLARE e4 VARCHAR(50);
DECLARE e5 VARCHAR(50);

DECLARE f1 VARCHAR(50);

SELECT CONVERT(c11,SIGNED) into b1;
SELECT CONVERT(c13,SIGNED) into b3;
SELECT CONVERT(c14,SIGNED) into b4;
SELECT CONVERT(c15,SIGNED) into b5;


select max(id) into actnumber from activationno where status=0 and userid=b4;

if b3=1 && b5=8 then
 set f1=8;
elseif b3=1 && b5=150 then
 set f1=150;
elseif b3=1 && b5=100 then
 set f1=100;
elseif b3=2 then 
 set f1=4;
elseif b3=3 then 
 set f1=4;
elseif b3=4 then 
 set f1=2;
elseif b3=5 then 
 set f1=2;
elseif b3=6 then 
 set f1=1;
else 
 set f1=0;
end if; 

 
 

if c1 is not null &&  c2 is not null then
  select left(c1,6) into e1;
  select right(c1,6) into  e2;
  select right(c2,6) into  e3;
  select e3 - e2 + 1  into e4;
  select e4/f1  into e5;
  INSERT INTO cardsrequest1 (creation_date,batch,start_serialnumber,end_serialnumber,pins,cards,dealer_id,denom_id,act_id,user_id) VALUES (CURDATE(),e1,e2,e3,e4,e5,b1,b3,actnumber,b4);
end if;

if c3 is not null && c4 is not null then
  select left(c3,6) into e1;
  select right(c3,6) into  e2;
  select right(c4,6) into  e3;
  select e3 - e2 + 1 into e4;
  select e4/f1  into e5;
  INSERT INTO cardsrequest1 (creation_date,batch,start_serialnumber,end_serialnumber,pins,cards,dealer_id,denom_id,act_id,user_id) VALUES (CURDATE(),e1,e2,e3,e4,e5,b1,b3,actnumber,b4);
end if;

if c5 is not null && c6 is not null then
  select left(c5,6) into e1;
  select right(c5,6) into  e2;
  select right(c6,6) into  e3;
  select e3 - e2 + 1 into e4;
  select e4/f1  into e5;
  INSERT INTO cardsrequest1 (creation_date,batch,start_serialnumber,end_serialnumber,pins,cards,dealer_id,denom_id,act_id,user_id) VALUES (CURDATE(),e1,e2,e3,e4,e5,b1,b3,actnumber,b4);
end if;


if c7 is not null && c8 is not null then
  select left(c7,6) into e1;
  select right(c7,6) into  e2;
  select right(c8,6) into  e3;
  select e3 - e2 + 1 into e4;
  select e4/f1  into e5;
  INSERT INTO cardsrequest1 (creation_date,batch,start_serialnumber,end_serialnumber,pins,cards,dealer_id,denom_id,act_id,user_id) VALUES (CURDATE(),e1,e2,e3,e4,e5,b1,b3,actnumber,b4);
end if;


if c9 is not null && c10 is not null then
  select left(c9,6) into e1;
  select right(c9,6) into  e2;
  select right(c10,6) into  e3;
  select e3 - e2 + 1 into e4;
  select e4/f1  into e5;
  INSERT INTO cardsrequest1 (creation_date,batch,start_serialnumber,end_serialnumber,pins,cards,dealer_id,denom_id,act_id,user_id) VALUES (CURDATE(),e1,e2,e3,e4,e5,b1,b3,actnumber,b4);
end if;

END$$

DROP PROCEDURE IF EXISTS `updating_date_cardrequest`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updating_date_cardrequest`()
BEGIN
DECLARE  l_id  INT;
DECLARE  l_activid  INT;
DECLARE  l_actdate  DATE;
DECLARE  l_last_row_fetched  INT;



DECLARE data1 CURSOR FOR select distinct b.act_id,a.actdate from `activationno` a , `cardsrequest1` b where a.id =b.act_id;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;


SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP
     FETCH data1 INTO l_activid,l_actdate;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
	   update cardsrequest1 set activdate=l_actdate where act_id=l_activid;
	  END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;
END$$

--
-- Functions
--
DROP FUNCTION IF EXISTS `xml_escape`$$
CREATE DEFINER=`root`@`%` FUNCTION `xml_escape`(`tagvalue` varchar(2000)) RETURNS varchar(2000) CHARSET latin1
BEGIN
IF (tagvalue IS NULL) THEN
RETURN null;
END IF;
RETURN REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
tagvalue,'&','&amp;'),
'<','&lt;'),
'>','&gt;'),
'"','&quot;'),
'\'','&apos;');
END$$

DROP FUNCTION IF EXISTS `xml_tag`$$
CREATE DEFINER=`root`@`%` FUNCTION `xml_tag`(`tagname` VARCHAR(2000), `tagvalue` VARCHAR(2000), `attrs` VARCHAR(2000), `subtags` VARCHAR(2000)) RETURNS varchar(2000) CHARSET latin1
BEGIN
declare result VARCHAR(2000);

SET result = CONCAT('<' , tagname);

IF attrs IS NOT NULL THEN
SET result = CONCAT(result,' ', attrs);
END IF;

IF (tagvalue IS NULL AND subtags IS NULL) THEN
RETURN CONCAT(result,' />');
END IF;

RETURN CONCAT(result ,'>',ifnull(xml_escape(tagvalue),''),
ifnull(subtags,''),'</',tagname, '>');

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activationno`
--

DROP TABLE IF EXISTS `activationno`;
CREATE TABLE `activationno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actno` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dealerid` int(50) NOT NULL,
  `confirmation` tinyint(1) NOT NULL,
  `finconfirm` tinyint(1) NOT NULL,
  `billingconfirm` tinyint(1) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `creation_time` time NOT NULL,
  `activation_date` date DEFAULT NULL,
  `activation_time` time NOT NULL,
  `hiacreated` tinyint(1) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`id`,`actno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `activ_check_tmp`
--

DROP TABLE IF EXISTS `activ_check_tmp`;
CREATE TABLE `activ_check_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `check_query` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cardsrequest1`
--

DROP TABLE IF EXISTS `cardsrequest1`;
CREATE TABLE `cardsrequest1` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `creation_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `batch` varchar(6) DEFAULT NULL,
  `start_serialnumber` varchar(6) DEFAULT NULL,
  `end_serialnumber` varchar(6) NOT NULL,
  `pins` varchar(50) NOT NULL,
  `cards` varchar(50) NOT NULL,
  `dealer_id` int(50) NOT NULL,
  `denom_id` int(50) NOT NULL,
  `act_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `check_tmp`
--

DROP TABLE IF EXISTS `check_tmp`;
CREATE TABLE `check_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `batch` int(50) NOT NULL,
  `serialnumber` int(50) NOT NULL,
  `activid` int(50) NOT NULL,
  `sn_status` varchar(50) NOT NULL,
  `ship_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sn_status` (`sn_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

DROP TABLE IF EXISTS `dealers`;
CREATE TABLE `dealers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealername` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `denomination`
--

DROP TABLE IF EXISTS `denomination`;
CREATE TABLE `denomination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `pinspercard` smallint(5) NOT NULL,
  `pinsvalue` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hia_tmp`
--

DROP TABLE IF EXISTS `hia_tmp`;
CREATE TABLE `hia_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `hias` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profil` smallint(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `exp_date` date DEFAULT NULL,
  `user_id` smallint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_receivers`
--

DROP TABLE IF EXISTS `mail_receivers`;
CREATE TABLE `mail_receivers` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_receivers_test`
--

DROP TABLE IF EXISTS `mail_receivers_test`;
CREATE TABLE `mail_receivers_test` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `profilename` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles_axs`
--

DROP TABLE IF EXISTS `profiles_axs`;
CREATE TABLE `profiles_axs` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `profil` smallint(50) NOT NULL,
  `function` smallint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_menu`
--

DROP TABLE IF EXISTS `profil_menu`;
CREATE TABLE `profil_menu` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(50) NOT NULL,
  `menucode` varchar(50) NOT NULL,
  `pathname` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xml_tmp`
--

DROP TABLE IF EXISTS `xml_tmp`;
CREATE TABLE `xml_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `contents` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

DELIMITER $$
--
-- Events
--
DROP EVENT `delete_noconfirm`$$
CREATE EVENT `delete_noconfirm` ON SCHEDULE EVERY 1 DAY STARTS '2013-09-23 01:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Delete all activations and serial not confirmed with all stakeho' DO BEGIN

DECLARE  activid  INT;
DECLARE  l_last_row_fetched  INT;

DECLARE data1 CURSOR FOR select id from activationno where confirmation=0 and finconfirm=0 and billingconfirm=0;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET l_last_row_fetched=1;

SET l_last_row_fetched=0;

OPEN data1;
 data1_cursor: LOOP
    FETCH data1 INTO activid;
       IF l_last_row_fetched=1 THEN
         LEAVE data1_cursor;
       END IF;
		delete from activationno where id=activid;
      delete from cardsrequest1 where act_id=activid;
	END LOOP data1_cursor;
CLOSE data1;

SET l_last_row_fetched=0;

END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
