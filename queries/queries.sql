--a
SELECT * FROM restodb.restaurant r  join restodb.location l on r.restaurantid = l.restaurantid
      WHERE r.name = 'Shawarma Palace';
 
--b 
SELECT  menuitem.category, menuitem.name, menuitem.description,menuitem.type, menuitem.price
FROM restoDB.restaurant as resto, restoDB.menuitem as menuitem
WHERE resto.restaurantID = menuitem.restaurantID and resto.name = 'Alirang'
order BY menuitem.category;
 
--c  
SELECT r.name,  l.manager_name, l.first_open_date FROM restoDB.RESTAURANT r, restoDB.LOCATION l
WHERE r.type = 'Mexican' AND r.restaurantID = l.restaurantID;
 
--d 	
SELECT  m.name, l.manager_name, l.week_open, l.weekend_open, r.url
FROM restodb.RESTAURANT r, restodb.MENUITEM m, restodb.LOCATION l
WHERE r.name = 'Shawarma Palace' AND r.restaurantID = m.restaurantID
     AND m.price = (SELECT MAX(price) FROM restodb.RESTAURANT r, restodb.MENUITEM m
                   WHERE r.name = 'Shawarma Palace' AND r.restaurantID = m.restaurantID)
     AND m.restaurantID = l.restaurantID;
 
--e  
SELECT r.type, m.category, round(AVG(m.price),2) as price
FROM restodb.RESTAURANT r, restodb.MENUITEM m
WHERE r.restaurantID = m.restaurantID
GROUP BY r.type, m.category
order by r.type, m.category;
 
 
--f   
SELECT  r.name as rater_name, re.Name as restaurant_name, COUNT(r8.userID) as num_of_ratings FROM restodb.RESTAURANT re, restodb.RATER r, restodb.RATING r8
		WHERE re.restaurantID = r8.restaurantID AND r.userID = r8.userID
	  GROUP BY re.Name, r.name
	  ORDER BY r.name
 
--g 
SELECT DISTINCT r.restaurantID, r.Name, r.Type FROM restodb.RESTAURANT r, restodb.RATER re, restodb.RATING r8
    WHERE r.restaurantID NOT IN
     (SELECT DISTINCT r.restaurantID FROM restodb.RESTAURANT r, restodb.RATER re, restodb.RATING r8
     WHERE r8.restaurantID = r.restaurantID AND re.userID = r8.userID
     AND (r8.date between '2015-01-01' AND '2015-01-31'))
     ORDER BY r.restaurantID;
 
 
--h 
SELECT r.name as restaurant_name, l.first_open_date as open_date
FROM restodb.RATER ra, restodb.RATING r8, restodb.RESTAURANT r, restodb.LOCATION l
WHERE ra.userID = r8.userID AND r.restaurantID = r8.restaurantID AND r.restaurantID = l.restaurantID
     AND ra.name = 'miggz4life'
     AND (r8.staff < r8.price OR r8.staff < r8.food OR r8.staff < r8.mood)
ORDER BY r8.date;
 
 
--i 
select resto.name, rater.name
from restodb.restaurant as resto, restodb.rater as rater, restodb.rating as rating
where rating.userid = rater.userid and rating.restaurantid = resto.restaurantid and
   resto.type = 'Mexican' and rating.food = 5
order by resto.name;
 
--j. -- Our interpretation: we can determine the popularity of a type of restaurant by determining its average (food + price) rating, and comparing it to the average (food + price) rating of other types of restaurants. We chose to base the popularity on food and price because generally if a restaurant has a good price and has good food, it will be more popular.  Therefore, each type will have a rating out of 10 in terms of popularity. They will reach 10 if the food and price average ratings are of 5 each. 
 
select restaurant.type, round(avg(rating.food + rating.price),1) as popularity_rating
                        from rating join restaurant on rating.restaurantid = restaurant.restaurantid
                        where restaurant.type = 'Mediterranean'
                        group by restaurant.type;
 
--k. 
select rater.name as rater_name, rater.join_date, rater.reputation, resto.name, rating.date as rating_date
   from restodb.rater as rater, restodb.restaurant as resto, restodb.rating as rating
   where rater.userid = rating.userid and rating.restaurantid = resto.restaurantid and (rating.food + rating.mood) = (select max(food + mood) from restodb.rating where restaurantid = resto.restaurantid)
   order by resto.name, rating_date;
 
 
--l. 
select rater.name as rater_name, rater.reputation, resto.name, rating.date as rating_date
   from restodb.rater as rater, restodb.restaurant as resto, restodb.rating as rating
   where rater.userid = rating.userid and rating.restaurantid = resto.restaurantid
       and (
          rating.food = (select max(food) from restodb.rating where restaurantid = resto.restaurantid)
       or rating.mood = (select max(mood) from restodb.rating where restaurantid = resto.restaurantid)
         )
   order by resto.name, rating_date;
 
--m. 
 
--  frequently = often, often = many times 
-- we assumed that "raters that rated a specific restaurant the most frequently" means the user that rated that restaurant the most amount of times 
-- ex: if user1 rated the restaurant 6 times and user2 rated it 3 times, then the query will return user1
 
CREATE TEMPORARY TABLE ratings_per_user (num_rates int, userid int);
 
INSERT INTO ratings_per_user select count(ratingItem.date) as num_rates, ratingItem.userID as userid 
from ratingItem, menuItem, restaurant
where ratingItem.itemid = menuItem.itemid and menuItem.restaurantid = restaurant.restaurantid
     	      and restaurant.name = 'Coras'
     		group by ratingItem.userid;
 
select rater.name, rater.reputation, ratingItem.comment, menuItem.name, menuItem.price
           from restodb.rater, restodb. restaurant, restodb.ratingItem, restodb.menuItem
           where ratingItem.userid = rater.userid and ratingItem.itemid = menuItem.itemid and   menuItem.restaurantId =     restaurant.restaurantid
     and menuItem.restaurantid = (select restaurantid from restodb.restaurant where name = 'Coras' )
     and rater.userid in (select userid from  ratings_per_user where num_rates = (select max(num_rates) from      ratings_per_user));
 
drop table ratings_per_user;
 
--n. 
create temporary table johns_ratings(userid int, combined_rating int);
insert into johns_ratings
 (select rating.userid, (rating.food + rating.mood + rating.price + rating.staff)
  from restodb.rating join restodb.rater on (rating.userid = rater.userid)
  where rating.userid in (select userid from restodb.rater where name = 'John'));
 
select rater.name, rater.email, johns_ratings.userid as johns_id
  from
  restodb.rater join restodb.rating on (rater.userid = rating.userid),
  johns_ratings
  where (rating.food + rating.mood + rating.price + rating.staff) < johns_ratings.combined_rating
 group by johns_id, rater.name, rater.email ;
 
drop table johns_ratings;
 
 
--o.  
 select distinct rater.name, rater.type, rater.email
             from restodb.rater join restodb.rating on rater.userid = rating.userid
             where
           ( select exists (select rating.comments from restodb.rating as rating2 where rating.userid = rating2.userid   and           rating.restaurantid = rating2.restaurantid
                   and rating.date <> rating2.date and (rating.date - rating2.date) < 37
                   and ((rating.food - rating2.food) = 4 or (rating.food - rating2.food) = 3) ));
