#user
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ( "James Smith" ,"21322@gmail.com",1,3,6,3,1,"$2y$10$DcNCcQvN8Z1i2aBxwNIwv.xlEd5Mjdjwv3BXltjusy.2.sUfqWdG2");
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ("Robert   Wilson","test@gmail.com",2,1,2,1,1,"$2y$10$KAhc2k5zGvx1PtBQDYkCve84kOK5Ex3pbNQ3Sr0fLYhC6ewOCyeQG");
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ("Paul Cook","third@gmail.com",3,2,3,1,1,"$2y$10$ekY4/tIlD0gPpyo17FyxBeI2CwfIfvqjbIiILnZbScrliGyy7VyD6");
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ("Linda Wood","lindaW@gmail.com",4,1,2,1,1,"$2y$10$/jQOQzS8h8kpCPH2S8K87.7nzo7RONpsRdEFeAHU.gwH9Haa4zIDK");
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ("Susan Hall","Susan@gmail.com",5,1,2,1,1,"$2y$10$Ngl3Z/V6ZIgb0suOi5Fcs.kuRShOH1eJsBqg9wQ/mh33dKPFN7xaK");
INSERT INTO User (user_name , email , profile_id, address_street_id, block_id,hood_id, address_city_id ,password) VALUES  ("Jean  White","echoHelloWorld@163.com",-1,1,-1,-1,1,"$2y$10$dijh6SsCYj1fWiExXruUBu4QlwHhqwgisj77MBdvRSnU/qytxmo/u");


#profile
INSERT INTO Profile (uid , photopath , self_intro, family_intro) VALUES  ( 1,"test.jpg","i am  James Smith","single" );

INSERT INTO Profile (uid , photopath , self_intro, family_intro) VALUES  ( 2,"test.jpg", "i am  Robert   Wilson","single");

INSERT INTO Profile (uid , photopath , self_intro, family_intro) VALUES  ( 3,"test.jpg","i am  Paul Cook","married" );

INSERT INTO Profile (uid , photopath , self_intro, family_intro) VALUES  (4 ,"test.jpg","i am Linda Wood" ,"single");

INSERT INTO Profile (uid , photopath , self_intro, family_intro) VALUES  (5 ,"test.jpg","i am Susan Hall","married" );


#message
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  (1,6,2,"","",0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 1,6,4  ,"","",0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  (1,6,5   ,"","",0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  (2,2,3   ,"","",0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 3,2,4,"test1","content1" ,1 ,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 3,2,5,"test2","content2" ,0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 4,1,2,"test3","content3" ,0,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 5,4,2,"test4","content4" ,1,0);
INSERT INTO Message (type , sender_id , receiver_id, title,body,location,status) VALUES  ( 6,4,2,"test5","content5" ,1,0);


#relation_list
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  ( 1,2,4,1);
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  ( 1,2,5,1);
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  (1,2,3,-1 );
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  (0,2,1,-1 );
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  ( 0,3,4,-1);
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  ( 0,2,1,-1);
INSERT INTO Relation_List (type , user1_id , user2_id, request) VALUES  ( 1,3,2,-1);


#city hood block street
#insert hood
INSERT INTO Hood (hname) VALUES  ( "hood1");
INSERT INTO Hood (hname) VALUES  ( "hood2");
INSERT INTO Hood (hname) VALUES  ( "hood3");

#insert block
INSERT INTO Block (bname) VALUES  ( "New Leaf Wellness Center");
INSERT INTO Block (bname) VALUES  ( "Pause Studio");
INSERT INTO Block (bname) VALUES  ( "The Studio (MDR) East");
INSERT INTO Block (bname) VALUES  ( "Unleashed by Petco");
INSERT INTO Block (bname) VALUES  ( "OneWest Bank");
INSERT INTO Block (bname) VALUES  ( "Marina Collection");


#insert city
INSERT INTO City (cname) VALUES  ( "Los Angeles");
INSERT INTO City (cname) VALUES  ( "New York");
INSERT INTO City (cname) VALUES  ( "Chicago");
INSERT INTO City (cname) VALUES  ( "Detroit");

#insert street
INSERT INTO Street (sname) VALUES  ( "Washington Blvd");
INSERT INTO Street (sname) VALUES  ( "Glencoe Ave");
INSERT INTO Street (sname) VALUES  ( "Beach Ave");

INSERT INTO Hood_and_Block (hid,bid) VALUES  ( 1,1);
INSERT INTO Hood_and_Block (hid,bid) VALUES  (1,2);
INSERT INTO Hood_and_Block (hid,bid) VALUES  (1,3);
INSERT INTO Hood_and_Block (hid,bid) VALUES  (2,4);
INSERT INTO Hood_and_Block (hid,bid) VALUES  (2,5);
INSERT INTO Hood_and_Block (hid,bid) VALUES  (3,6);

INSERT INTO Block_and_Street (bid,sid) VALUES  ( 1,1 );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 1,2 );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 2,1 );
INSERT INTO Block_and_Street (bid,sid) VALUES  (2,2  );
INSERT INTO Block_and_Street (bid,sid) VALUES  (3,1  );
INSERT INTO Block_and_Street (bid,sid) VALUES  (3,2  );
INSERT INTO Block_and_Street (bid,sid) VALUES  (4,1  );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 4,2 );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 5,1 );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 5,2 );
INSERT INTO Block_and_Street (bid,sid) VALUES  ( 6,3 );



