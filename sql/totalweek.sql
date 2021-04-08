USE house;
SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS weektotal

FROM blue;