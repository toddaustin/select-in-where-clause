# Using a SELECT statement in a WHERE clause

This snippet came about because I needed to reference the same table to select a store to get its Region, but then use the result of that query to SELECT all stores that had the same matching Region. All in one query.

I found that you can nest select statements inside WHERE clauses, or as they are called, subqueries. I had not used them before.


SQL Table

| region | Store |
_________________
