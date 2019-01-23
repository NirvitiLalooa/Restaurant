CREATE TYPE restoDB.raterType AS ENUM ('blog', 'online', 'food critic');
CREATE TYPE restoDB.itemType AS ENUM ('food','beverage');
CREATE TYPE restoDB.itemCategory AS ENUM ('starter','main', 'dessert');
 

create table restoDB.rater
  (
    userID smallint check (userID > 0),
    email varchar(35),
    name varchar(25),
    join_date date,
    type restoDB.raterType,
    reputation integer default 1,
    check (reputation between 1 and 5),
    primary key (userID)
  );

create table restoDB.restaurant
(
  restaurantID smallint check (restaurantID > 0),
  name varchar(25),
  type varchar(25),
  url varchar(90),
  primary key (restaurantID)
);


create table restoDB.location
(
  locationID smallint check (locationID > 0),
  first_open_date date,
  manager_name varchar(25),
  phone_number varchar(15),
  street_address varchar(25),
  week_open time,
  week_close time,
  weekend_open time,
  weekend_close time,
  restaurantID smallint,
  primary key (locationID),
  foreign key (restaurantID)
    references restoDB.restaurant
);
 
create table restoDB.rating
(
  userID smallint,
  date date,
  price smallint check (price between 1 and 5),
  food smallint check (food between 1 and 5),
  mood smallint check (mood between 1 and 5),
  staff smallint check (staff between 1 and 5),
  comments varchar(480),
  restaurantID smallint,
  primary key (userID, date),
  foreign key (restaurantID)
    references restoDB.restaurant ON DELETE CASCADE,
  foreign key (userID)
    references restoDB.rater ON DELETE CASCADE)
 
 
create table restoDB.menuItem
(
  itemID smallint check (itemID > 0),
  name varchar(50),
  type restoDB.itemType,
  category restoDB.itemCategory,
  description varchar(200),
  price numeric(4,2),
  restaurantID smallint,
  primary key (itemID),
  foreign key (restaurantID)
    references restoDB.restaurant ON DELETE CASCADE
)
 
 
create table restoDB.ratingItem
(
  userID smallint,
  date date,
  itemID smallint,
  rating smallint check (rating between 1 and 5),
  comment varchar(350),
  primary key (userID, date, itemID),
  foreign key (userID)
    references restoDB.rater ON DELETE CASCADE,
  foreign key (itemID)
    references restoDB.menuitem ON DELETE CASCADE
);
 
 
insert into restoDB.rater(userid, email, name, join_date, type, reputation)

  values(1,'miggz@umanitoba.ca', 'miggz4life', '16 april 2014', 'online', 3),
        (2,'luc_cyril@uottawa.ca', 'lucky_luc', '19 jan 2012', 'online', 5),
        (3, 'pete_wu@yahoo.ca', 'petewu', '17 june 2017', 'food critic', 4),
        (4, 'mich_duss@yahoo.ca', 'mishie33', '22 may 2014', 'blog', 4),
                  (5, 'ahmed_55@gmail.ca', 'ahmi', '25 february 2010', 'online', 2),
        (6, 'melo_star@gmail.ca', 'melimelo', '9 november 2015', 'online', 3),
        (7, 'alessia_cara@gmail.ca', 'cara_creator', '28 december 2015', 'blog', 2),
      (8, 'tyra_banks@yahoo.ca', 'tyra_model', '31 october 2016', 'online', 1 ),
  (9, 'enrique_iglesias@sympatico.ca', 'enrique_latino', '13 july 2013','blog', 5),
  (10, 'sean_paul@rapper.ca', 'daRightTemperature', '19 may 2016','food critic', 4),
  (11, 'julia_micheals@yahoo.ca', 'julia_sings','27 january 2017', 'online',1),
        (12, 'gods_plan@gmail.ca', 'drake6', '15 jan 2018', 'food critic', 4),
        (13, 'beyonce_knowles@gmail.ca', 'queenB', '18 june 2015','blog', 5 ),
        (14, 'justin_bieber@yahoo.ca', 'jbeibs', '4 march 2014', 'online', 3),
        (15, 'selena_gomez@gmail.ca', 'alexRusso', '16 july 2015','blog', 4),
   (16,'dua_lipa@yahoo.ca', 'independent_lipa', '24 october 2010', 'blog', 2);
    (17, 'john_smith@hotmail.ca', 'John', '6 june 2011', 'food critic', 4),
    (18, 'johnnyboi@gmail.ca', 'John', '14 september 2013', 'online');
 
 
 
 
 
 
insert into restoDB.restaurant(restaurantid, name, type, url)
        values(1, 'Shawarma Palace', 'Mediterranean', 'http://shawarmapalace.ca/'),
     (2, 'McDonalds', 'Burgers', 'https://www.mcdonalds.com/ca/en-ca.html'),
     (3, 'Thai express', 'Asian', 'https://www.thaiexpress.ca/'),
     (4, 'Coras', 'Breakfast', 'http://www.chezcora.com/en'),
     (5, 'The Green Door', 'Vegetarian', 'http://www.thegreendoor.ca/'),
     (6, 'Jimmy the Greek', 'Mediterranean', 'http://www.jimmythegreek.com/'),
     (7, 'Pizza Pizza', 'Pizza', 'http://www.pizzapizza.ca/'),
     (8,'Boston Pizza', 'Italian', 'https://bostonpizza.com/en/index.html'),
     (9, 'Burrito gringo', 'Mexican', 'http://burritogringo.ca/'),
     (10, 'Ahora', 'Mexican', 'http://www.ahora.ca/'),
     (11, 'Lone Star', 'Texas grill', 'https://www.lonestartexasgrill.com/'),
     (12, 'Alirang' , 'Asian', 'https://ottawafoodies.com/vendor/1764');
 
 
insert into restoDB.menuitem(itemid, name, type, category, description, price,,restaurantid)
values( 1, 'Chicken shawarma platter', 'food', 'main', 'Chicken shawarma with rice, potatoes, salad, pita bread, hummus and garlic sauce', 16.50, 1),
   (2, 'Potatoes and garlic sauce', 'food', 'starter', 'Crispy potatoes with seasoning and garlic sauce', 5.00, 1),
   (3, 'Baklava', 'food', 'dessert', 'Flaky pastry with nuts and honey', 1.50, 1),
 (4, 'Beef shawarma sandwich', 'food', 'main', 'Pita sandwich with your choice of toppings, hummus/garlic and beef shawarma', 7.00, 1),
   (5, 'McDouble','food', 'main', 'Burger with two patties and tomatoes, pickles, ketchup, ...', 2.50, 2),
  (6 , 'Milkshake', 'beverage', 'dessert', 'Chocolate, strawberry or vanilla thick milkshake', 3.00, 2),
  (7, 'Chicken snack wrap', 'food', 'starter', 'Grilled or crispy chicken wrap with cheese, lettuce, ranch or BBQ sauce', 3.00, 2),
(8, 'Pad thai', 'food', 'main', 'Stir-fried rice noodle dish with chicken,beef or shrimp and tofu', 10.00, 3),
(9, 'Fried banana', 'food', 'dessert', 'Fried banana served with chocolate syrup', 5.00, 3),
(10, 'Spring roll', 'food', 'starter', 'Vegetable and vermicelli wrapped in rice paper and served with peanut sauce', 3.50, 3),
(11, 'Waffles', 'food', 'main', 'Waffles with banana pieces, caramel sauce and whipped cream', 10.50, 4),
(12, 'Blueberry pancakes', 'food', 'main', 'Blueberry pancakes with a white chocolate sauce', 10.50, 4),
(13, 'French toast', 'food', 'main', 'French toast with a touch of cinnamon and nutmeg, set beneath a mountain of fruit', 12.00, 4),
(14, 'Smoothie', 'beverage', 'starter', 'Smoothie with fresh fruit and honey', 6.00, 4),
(15, 'Avocado salad', 'food', 'starter', 'Avocados with lime juice and turnips', 4.50, 5),
(16, 'Fresh bread', 'food', 'starter', 'Fresh multigrain bread made with spelt flour', 2.50, 5),
(17, 'Tofu dish', 'food', 'main', 'Sauteed tofu and vegetables with a teriyaki sauce', 6.50, 5),
(18, 'Banana cake', 'food', 'dessert', 'Vegan banana cake with cream cheese icing', 4.50, 5),
(19, 'Chicken souvlaki', 'food', 'main', 'Seasoned chicken with tzatziki sauce and rice, potatoes and salad', 11.00, 6),
(20, 'Pork gyros', 'food', 'main', 'Pita sandwich with seasoned pork, tomatoes, onions and tzatziki sauce ', 7.50, 6),
(21, 'Fried calamari', 'food', 'starter', 'Calamari lightly fried in a bread batter', 10.00, 6 ),
(22, 'Hawaiian pizza', 'food', 'main', 'Pizza with pineapple and ham pieces', 12.00, 7),
(23, 'Meat lovers pizza', 'food', 'main', 'Pizza with bacon, beef, and sausage', 12.00, 7),
(24, 'Honey garlic chicken wings', 'food', 'starter', 'Chicken wings marinated in a honey garlic sauce', 10.00, 7),
(25, 'Fettucine alfredo', 'food', 'main', 'Fettucine pasta with a creamy white alfredo sauce', 16.00, 8),
(26, 'Seven cheese ravioli', 'food', 'main', 'Ravioli stuffed with Parmesan, Emmental, ricotta, fontina and Romano with marinara sauce.', 16.50, 8),
(27, 'Pesto chicken bowtie', 'food', 'main', 'Alfredo pesto sauce with sun-dried tomatoes, topped with grilled chicken breast', 17.00, 8),
(28, 'Chocolate brownie', 'food', 'dessert', 'Chocolate brownie with two scoops of vanilla bean ice cream, caramel and chocolate sauce', 5.99, 8),
(29, 'Pork burrito', 'food', 'main', 'Tortilla bread with beans, cilantro, cheese, salsa,toppings and pulled pork', 9.45, 9),
(30, 'Mexican ground beef quesadillas', 'food', 'main', 'Tortilla, sauteed fajita peppers and onions, mexican ground beef, cheddar & jack cheese', 9.30, 9),
(31, 'Jarritos soda', 'beverage', 'starter', 'Lime flavored mexican soda', 2.99, 9 ),
(32, 'Churros', 'food', 'dessert', 'Deep fried flour batter topped with cinnamon and sugar', 2.00, 9),
(33, 'Nachos', 'food', 'starter', 'Corn chips, black beans, cheese, salsa gringa, guacamole, sour cream', 7.00, 10),
(34, 'Tostada','food', 'main', 'Steak, lettuce, black beans, salsa Ahora, guacamole and sour cream in a tortilla shell', 9.75, 10),
(35, 'Avocado wedges', 'food', 'starter', 'Fresh avocado wedges seasoned, battered, and golden-fried, served with tomatillo pepper', 8.50, 11),
(36, 'Coconut shrimp', 'food', 'starter', 'Hand breaded and crispy fried, with Texas Red dipping sauce', 8.75, 11),
(37, 'Fish tacos', 'food', 'main', 'Southern-fried tilapia, tomatillo salsa and mole in two flour tortillas with taco slaw. Toppings include pico de gallo, jack cheese, cilantro and lime.', 17.00, 11),
(38, 'Bulgogi', 'food', 'main', 'Marinated and seasoned beef tenders with onions, green peppers; served with rice', 11.00, 12),
(39, 'Kimchi', 'food', 'starter', 'Spicy pickled cabbage', 2.00, 12),
(40, 'Green tea', 'beverage', 'starter', 'Green tea leaves from Korea', 1.50, 12),
(41, 'Yukgaejang', 'food', 'main', 'Beef stew with vermicelli, sliced onions and veggies', 10.95, 12);
 
insert into restoDB.rating(userid, date, price, food, mood, staff, comments, restaurantid)
  values(2, '13 january 2015', 4,3,4,5, 'Staff was very friendly. Food was good but a bit cold.', 1),
(4, '22 january 2015', 4,5,3,4, 'Delicious shawarma as usual. Music was a little loud.', 1 ),
(5, '18 august 2016', 5,5,5,5, 'I love shawarma! This is the best place for shawarma in Ottawa! Im from Egypt and this food reminds me of home.', 1),
(1, '15 may 2014', 4,5,5,5, 'This resto is fire. The flavor is as strong as Lance Armstrong. Its nearly perfect.', 1),
   (1, '1 june 2014', 2,1,1,1, 'This restaurant is not on par with any other restaurant I have visited. It is not that great.', 1),
   (1, '20 june 2014', 5,4,4,5, 'TBH, this restaurant exceeds my expectations. Glorious!',1),
(16, '14 january 2015', 5, 4, 1, 2, 'McDonalds has a low price, and the food is great. The atmosphere was unpleasant as there were screaming kids.',2 ),
  (16, '20 january 2015', 5, 1,3,2, 'I did not enjoy the food at McDonalds. Cheap price, cheap food.', 2),
    (16, '3 february 2015', 4,5,4,5, 'Food was exceptional. Price was reasonable.', 2),
   (16, '10 february 2015', 5, 1, 3,3, 'Food was atrociously horrible.', 2 ),
(4, '30 june 2016', 5,3,4,4, 'Food was delicious but I felt guilty because of how fatty it is! McDonalds is cheap as always.', 2),
  (1, '10 january 2015', 5, 3, 4,4, 'Good overall experience. Food hits the spot but dont expect something too fancy.', 2),
(2, '1 april 2015', 5,4,5,5, 'The food was served fast and it was delicious. The location is convenient, it is close to my work. I had a great overall experience!',2 ),
(9, '17 november 2014', 3,1,1,1, 'Do you know what it feels likeeee to eat bad food in a bad place?',2 ),
(18, '15 january 2014', 3,1,1,1, 'Price reflected the poor overall quality', 2),
 (1, '1 december 2016', 5,4,5,5, 'Quick service and the restaurant was clean and quiet!', 3),
(4, '23 april 2015', 5,4,5,5, 'Food is tasty but needs a little more variety! Service was rapid.', 3),
(3, '23 july 2017', 5,5,5,5, 'Food is scrumptious and steaming hot. This place is my go-to on a busy day.', 3),
   (6, '12 december 2015', 4,5,5,4, 'I think it is very authentic thai food. I like it very much.', 3),
   (7, '11 january 2016', 3,4,2,3, 'Not my type of food. I am not an asian food type of person.', 3),
(1, '14 february 2017', 5,5,5,5, 'Brought my girlfriend here for Valentines Day. The staff made it special and had heart-shaped fruits. The food was delicious and reasonably priced.',4),
(4, '5 september 2016', 4,5,4,4, 'I love sweet breakfast foods and this place has some original breakfast dishes! The place was clean and quiet.', 4),
(2, '12 june 2014', 3,4,5,5, 'Staff was quick and I was pleasantly surprised by the food', 5),
(2, '25 june 2014', 3,1,4,4, 'Food was disgusting! They must have added dirt to their food!', 5),
(2, '4 july 2014', 3,5,4,4, 'I absolutely loved this food, it was like an explosion of greatness in my mouth.', 5),
(2, '10 august 2014', 2,2,3,3, 'Not impressed with the food here', 5),
(4, '22 november 2016', 3,5,3,4, 'I love the food here but it is cafeteria style and you have to wait in line to get your food. When it is time to find a seat, well lets just say good luck finding one. I will probably take my food to go next time.',5),
  (13, '24 july 2016', 5,5,4,4 ,'Great selection of tasty vegetarian/vegan and gluten free food', 5),   
   (6, '13 march 2016', 5,5,5,4, 'I love it, and the food has always been tasty and fresh. Greek for the win!', 6),
   (9, '15 august 2014', 5,4,3,1, 'I did not enjoy my experience here because the staff was very rude to me. Food was decent but I had to take it to-go because I did not feel welcomed.', 6),
   (10, '13 june 2016', 5,4,5,5, 'Cheap food yet good quality. Service is very fast even when there are long line ups.', 6),
   (12, '25 feb 2018', 1,3,2,2, 'The food is ok, but you better not ask for extra olives/tazatzki or anything for that matter. You will have to pay for it!! On a plate that costs $11, horrible prices!! ', 6),
(3, '15 december 2017', 4,4,4,4, 'This company makes good pizza for a good price! They even have lactose-free cheese for the pizza! Awesome for me because Im lactose intolerant.',7 ),
(5, '10 september 2012', 2,1,4,4, 'You call this food? I couldve made this at home for way cheaper.', 7),
(3, '21 october 2017', 1,2,3,3, 'You do not get what you pay for. Overpriced and food that is easy to make at home.',8),
(14, '8 april 2014', 4,4,2,4, 'Food a little pricey, but arrived at our table fast. I asked the waiter to reheat my food and he did it gladly. Mood was poor because we were seated next to a table with a crying baby.', 8),
   (13, '9 august 2016', 1,2,3,3,'Nothing great. Way over priced,and everything tasted the same,we had pizza and pasta and it just wasnt good,my kids didnt like anything.', 8),
   (15, '10 august 2015', 2,2,3,4, 'Too expensive for the value, food is not flavorful. Staff was nice and admitted that I shouldnt order a specific menu item because it is not good lol.', 8),
(17, '12 july 2012', 2,1,2,2, 'Service was slow, and the quality of food was very low. Not impressed.', 8),
   (14, '13 may 2014', 3,1,4,4, 'The worker put too many beans in my burrito, and the meat was dry. Would not want to eat here again.', 9),
(16, '12 february 2014', 4, 2, 1, 1, 'The meat was dry, the place was dirty and the service was slow. Not impressed', 9),
   (15, '21 september 2015', 5,5,4,4, 'Food was juicy,tasty and fresh. Price was great; it was under 10$. My wallet and stomach are happy. The mood was what you can expect from a small fast food place.', 9),
   (12, '3 feb 2018',5,5,4,5 ,'Im pretty nuts for this franchise in general. The food itself is fantastic, fresh and wholesome. Best thing to happen to fast food since subway.', 9),
(1, '22 may 2015', 1,1,1,1, 'Nope did not like this place at all; music was bad, food was subpar..', 9);
(4, '20 march 2015', 5,4,2,4, 'Food was tasty, genuine Mexican food. I gave it a low mood rating because the place was crowded and loud.', 10),
 (14, '3 june 2014', 5,5,4,4, 'Delicious, homestyle, Mexican food with friendly service and low prices.', 10),
   (13, '5 july 2016', 5,2,3,3, 'Its a bit tricky for a vegetarian as all meals have chicken or steak', 10),
   (15, '3 september 2015', 5,3,2,2, 'The place was small and the food was too spicy. The staff was rushing to serve clients and a little rude.', 10),
(16, '15 march 2015', 1,1,2,2, 'Did not enjoy this restaurant, our table was dirty and food was cold.', 10),
(3, '21 january 2018', 3,5,2,5, 'The restaurant is too loud. Waiter was very nice and food was delicious, but expensive.', 11 ),
 (16, '20 March 2016', 3,5,5,5, 'Pricey, but the food is delicious and the flavors are 3-dimensional. The staff are cheerful and ready to help.', 11),
   (15, '27 august 2015', 5,5,5,5, 'Price reflects the great quality. The mood was great, there was good music,and the ambiance was vibrant with a lot of happy people for happy hour.', 11),
(3, '14 july 2017', 5,5,4,4, 'Wow! This korean place has the best meals! I will be coming back every week.',12),
(3, '24 july 2017', 5,5,3,4, 'Update! I came back for week 2 and the food is just as great. Found my new favorite place.', 12),
(5, '7 june 2016', 4,5,4,4, 'Loved this food! Delicious and well prepared.', 12),
(5, '18 june 2016', 4,2,4,4, 'Food was not great. I regret eating here.', 12 ),
(5, '5 july 2016', 4,5,3,5, 'Food was delicious, I am very satisfied. Staff was quick and courteous.', 12),
(5, '22 july 2016', 4,1,4,4, 'Food was way below my expectations. Mood was relaxed.', 12),
(4, '16 january 2015', 4,5,3,3, 'Food was delicious. Place was crowded and waiter did not refill our sides very fast.', 12),
 
 
insert into restoDB.ratingitem(userid, date, itemid, comment, rating)
values(2, '12 may 2016', 6, 'The strawberry milkshake was heavenly... Every slurp felt like I was a step closer to diabetes because of how rich it was.', 4),
(3, '10 august 2017', 8, 'I ordered a chicken pad thai, but I ordered medium and it was way too spicy for me!!! If you arent used to spicy, order the mild! Other than that it was yummy.', 3),
(5, '2 february 2012', 1,  'The portions are generous and every item in the platter is seasoned to perfection.', 5),
(6, '5 february 2016', 28, 'The brownie was just what I needed to get over my break-up. Maybe there are good things in this world after all.', 5),
(6, '7 april 2016', 35, 'The avocado wedges were a bit soggy, and the sauce did not go well with it.', 2),
(6, '21 may 2016', 13, 'The french toast was delicious, crunchy and soft, sweet but not too sweet.', 4),
(6, '5 jan 2016', 11, 'The waffles were delicious! It satisfied my sweet tooth', 5),
(6, '20 march 2016', 14, 'The kale/kiwi smoothie was so refreshing, it really cleansed my body', 4),
(7, '20 february 2016', 5, 'The McDouble was prepared too fast and the patty was hard and dry. Not impressed.', 1),
(7, '5 march 2016', 7, 'The snack wrap was gross! Never again.', 1),
(7, '14 january 2016', 3, 'The honey mixes well with the nuts. This dish makes me wanna stay, a minute, just take my time. All i wanna do is stay', 5),
(7, '27 february 2016',11 ,'The waffles at Coras were sweet, crunchy on the outside and moist on the inside. So glad this was my breakfast!', 5),
(7, '5 april 2016', 19, 'The chicken souvlaki was delicious, the potatoes were amazing but they only gave me 2, so the portion was not big enough. Also the tzatziki sauce was not that yummy.', 3 ),
(7, '14 april 2016', 22, 'The hawaiian pizza was good but I had to add spicy sauce or another type of sauce to add a bit of flavor to it!', 4),
(7, '25 april 2016', 31, 'The jarritos soda was too fizzy and not that tasty.', 1),
(7, '13 may 2016', 37, 'The fish tacos were exceptionally delicious. Cooked to perfection with sweet marinades and chimichanga sauce.. ahh this is the life.', 5),
(7, '22 may 2016', 39, 'The kimchi was a bit sour, not as good as other places.', 2),
(7, '4 june 2016', 24, 'The honey garlic chicken wings were a perfect appetizer! Cooked well and very savory.', 5),
(8, '12 november 2016', 33, 'The nachos with black beans and guacamole were fresh, delicious and well worth the price. ', 5),
(8, ' 23 november 2016', 27, 'The pesto chicken bowtie pasta looked way better in the picture and was cold when it arrived to my table. Not a gourmet dish by any means.', 1),
(8, '5 january 2017', 12, 'The blueberry pancakes were too sweet, especially with the white chocolate on top.', 2),
(8, '16 february 2017', 35, 'The avocado wedges are an original idea for an entree, and very well executed', 5),
(8, '1 december 2016', 9, 'I never knew a banana could be fried. A delicious new discovery.', 5);
(9, '7 january 2015', 17, 'The tofu dish was simply exquisite. Every bite brought with it an immense sense of pleasure.', 5),
(9, '11 february 2015', 13, 'The french toast was soggy and had too much nutmeg in it. Not the best.', 2),
(9, '18 april 2015', 26, 'The seven cheese ravioli was delightful. Loved all the different cheese flavors and the marinara sauce that was freshly made.', 5),
(9, '20 may 2015', 34, 'The tostada was pretty good, but a little messy to eat because the tortilla was too small and the contents were spilling out.', 4),
(10, '2 june 2016', 29, 'The pork burrito was tasty, the pulled pork was nicely marinaded and juicy. The toppings were fresh.', 5),
(10, '22 june 2016', 21, 'The fried calamari tasted stale. Disappointed af.', 1),
(10, '6 july 2016', 30, 'The mexican ground beef quesadillas were as good as I expected.', 4 ),
(10, '30 august 2016', 40, 'The green tea was soothing and was da right temperature.', 5),
(11, '5 february 2017', 23, 'Meat lovers pizza was too meaty... Gross!', 1),
(11, '23 february 2017', 36, 'The coconut shrimp was perfect. I felt like I was on the ocean.', 5),
(11, '6 may 2017',32, 'The churros really hit the spot. Sweet and crunchy!', 4),
(11, '29 may 2017', 14, 'The kiwi smoothie I had was pretty good but overpriced.', 3),
(12, '16 jan 2018', 33, 'I usually love nachos but this places nachos tasted too healthy, which is a buzzkill.', 2),
(12, '25 jan 2018', 22, 'Hawaiian pizza was so yummy. A part of gods plan for sure.', 5 ),
(12, '19 february 2018', 20, 'The pork gyros was what I expected; good, cheap and filling. Gave me bad breath though.', 4),
(12, '15 march 2018', 14, 'Had a yummy passionfruit smoothie. Passionate from miles away.', 5),
(14, '1 jan 2015', 15, 'Avocado salad is not my favorite, since it did not taste fresh.', 2),
(14, '16 may 2015', 10, 'The spring roll was light, tasty and had a good sauce.',4),
(14, '18 july 2016', 23, 'The meat lovers pizza had dry meat on it, I feel like it was meat leftovers.', 2);
 
insert into restodb.location(locationid, first_open_date, manager_name, phone_number, street_address, week_open, week_close, weekend_open, weekend_close, restaurantid)
   values(11, '15 september 2015', 'Mohammed Ghaddar', '613-789-9533', '464 Rideau St', '1100','0100', '1100', '0300',1 ),
       (12, '2 june 2015', 'Ali Beretta','613-777-4545', '2440 Bank St', '1100','0100','1100','0200', 1),
       (21, '6 september 2006', 'John Smith', '613-526-1258','2380 Bank St', '0000', '2359', '0000', '2359', 2 ),
       (22, '15 august 2004', 'Samantha Brooks','613-249-9028' , '1661 Hunt Club Rd', '0000', '2359', '0000', '2359',2),
       (23, '22 october 2001', 'Samra Cortez','613-789-7911' , '450 Terminal Ave', '0700', '2200', '0700', '2100', 2),
       (31, '14 april 2002', 'Mike Chen', '613-680-8977', '2210 Bank St', '1100', '2100', '1100', '2100', 3 ),
       (32, '15 december 2000', 'Joy Wu', '613-505-4643', '100 Bayshore Dr', '1100', '2100', '1100', '1900', 3),
       (41, '20 october 2005', 'Susan Chartrand', '613-523-2672','2629 Alta Vista Dr', '0600', '1500', '0700', '1500', 4),
       (42, '9 july 2007', 'Adam Levine', '613-262-8511', '280 W Hunt Club Rd', '0600', '1500', '0700', '1500', 4 ),
       (51, '13 february 2009', 'Alexis Bledel', '613-234-9597', '198 Main St', '1100', '2100', '1100', '1800', 5),
       (61, '18 may 2007', 'Anna Kendrick', '613-842-0897', '1200 St Laurent Blvd', '0900', '2100', '1000', '1900', 6),
       (62, '10 july 2007', 'Ariana Grande', '613-321-5473', '50 Rideau St', '0930', '2100', '1000', '1900', 6),
       (71, '20 august 2008', 'Blake Lively', '613-737-1111', '2515 Bank St', '1100', '0200', '1100', '0300', 7),
       (72, '16 november 2010', 'Barack Obama', '613-737-1112', '1779 Carling Ave', '1100', '0200', '1100', '0300', 7),
       (81, '29 april 2011', 'Brad Pitt', '613-248-0802', '2980 Conroy Rd', '1100', '2359', '1100', '0100', 8),
       (82, '25 january 2012', 'Bruno Mars', '613-746-1039', '1055 St Laurent Blvd', '1100', '0100', '1100', '0200', 8),
       (91, '30 march 2010', 'Kylie Jenner', '613-247-7777', '2430 Bank St', '1030', '2200', '1100', '2100', 9),
       (92, '9 june 2009', 'Kendall Jenner', '613-564-9696', '566 Bronson Ave', '1030', '2300', '1030', '2300', 9),
       (101, '14 july 2009', 'Channing Tatum', '613-562-2081', '307 Dalhousie St', '1130', '2200', '1130', '2300', 10),
       (111, '8 may 2016', 'Chris Harrison', '613-742-9378', '1211 Lemieux St', '1100', '2300', '1100', '2359', 11),
       (112, '19 june 2010', 'Cristiano Ronaldo', '613-562-9865', '128 George St', '1100', '2300', '1100', '0100', 11),
       (121, '23 march 2013', 'Wonsook Lee', '613-789-2223', '134 Nelson St', '1130', '2200', '1130', '2300', 12);
