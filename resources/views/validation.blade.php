<form action="" method="post">
	@csrf
	<input type="text" name="name" placeholder="name">
	<input type="text" name="email" placeholder="email">
	<input type="number" name="amount" placeholder="amount">
	<input type="number" name="age" placeholder="age">
	<input type="checkbox" name="agree">
	<button type="submit">Submit</button>
</form>