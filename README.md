# Using subqueries (or Using a SELECT statement in a WHERE clause)

This snippet came about because I needed to get all stores that matched certain region, when given only one store. 

Here I reference the rStore table to select a store to get its Region; then use the result of that query to SELECT all stores from rStore that have the same matching Region. I then use that to join another table to get the levels of that result.


#### SQL Table: rStore

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

#### SQL Table: lList
| Levels | Store |
| ------------- | ------------- |
| A  | Store 1  |
| A  | Store 2  |
| B  | Store 3  |
| B  | Store 4  |
| A  | Store 5  |
| C  | Store 6  |
| A  | Store 7  |
| B  | Store 8  |

```sql
SELECT * from rStore join lList as list on rStore.Store = list.Store where Region = (select Region from (select * from rStore where Store = 'Store 1')ras) order by list.Store
```

This query will first set Region = 1, then output the following:  


| Region  | Store | Levels | Store |
| ------------- | ------------- | ------------- | ------------- |
| 1  | Store 1  |  A  | Store 1  |
| 1  | Store 2  |  A  | Store 2  |
| 1  | Store 3  | B  | Store 3  |
| 1  | Store 4  | B  | Store 4  |


