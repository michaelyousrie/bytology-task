# what is this?
This is a simple terminal script requested by Bytology company to do the following:
- Accepts 2 integer arguments.
- Calculates the average, area, & squared value of area.
- Stores all data to MySQL DB.
- Recalls Last 5 rows and presents to terminal.
- Generate a HTML document with CSS styling containing last 5 results.

# How to run?
1. Clone the project to your local machine using the `git clone` command.
2. Create a new database.
3. Setup the database credentials in the `.env` file.
4. Import the included mysql file `bytology_task.sql` into the database you created.

# Command Line
- Run `php bytology {num1} {num2}` to run the command line tool.

# Web
- Just open the `index.php` file in a web browser.

---

# Solution to problem 2:
## Observation and Assumptions:
- Using the included screenshot, I can tell that the oldest queue job with ID 9 has been stuck on processing for about 4 hours till the next queue order was made. 
- This makes me think that the queue job has failed or taking a really long time which isn't ideal either.
- Assuming that the queue job failed, I can see that the next queue jobs are still waiting for that failed job to finish which is a problem because they'll just be hanging there forever.

## Questions:
- What products/items are in that order. It might prove useful to know down the road.
- If there are any special circumstances surrounding that order or any out-of-the-ordinary non-standard things invovled like, for example, using a payment or a shipping gateway that was recently implemented or something similar to that.

## Actions/Approach:
- The first thing I would definitely do is investigate the log files for the exporting system that we're using. I need to know the error that caused the job to fail and proceed from there depending on what I'll find.
- If the error is in the exporting system itself then it'll be fixed from there. However, if the error is ambiguous then I'll start investigating in the entities involved in that order like the payment/shipping gateways used for example. Perhaps the payment is not done yet so the shipping can't be done until the payment is confirmed. Perhaps the order is not yet confirmed.
- Also, I'll definitely fix the problem that when a queue job fails the rest of the jobs will just be on hold waiting for that failed job to finish. That can be done by marking the job as failed as soon as it fails and continuing normally with the rest of the queued jobs. Later on, we can investigate all the failed jobs on their own.
