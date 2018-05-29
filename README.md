# Using a SELECT statement in a WHERE clause

This snippet came about because I needed to reference the same table to select a store to get its Region, but then use the result of that query to SELECT all stores that had the same matching Region. All in one query.

I found that you can nest select statements inside WHERE clauses, or as they are called, subqueries. I had not used them before.


SQL Table

| Region  | Store |
| ------------- | ------------- |
| 1  | Store 1  |
| 1  | Store 2  |
| 1  | Store 3  |
| 1  | Store 4  |
| 2  | Store 5  |
| 2  | Store 6  |
| 2  | Store 7  |
| 2  | Store 8  |


```sql
SELECT * from rStore join levels_list as list on rStore.Store = list.Store where Region = (select Region from (select * from rStore where Store = '$area')ras) order by list.Store
```
