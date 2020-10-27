# What:
This is an [Insecure Direct Object Reference](https://portswigger.net/web-security/access-control/idor) vulnerability. Which basically allows someone to access information just by editing an arbitary ID. You exploit this with the following steps:
1. Go to the index page and select any bill you do have access to.
2. Change the number found in the URL until you see a bill you don't have access to.

# Why
This is caused by the fact that we only validate that the bill ID is a number (see routes/web.php) and not the user ID of who owns it (see BillController::show()).

# Fix:
In the controller before we load the resource, one potential solution is that we simply need to stop execution if the user does not have access to it. Consider the following potential option:
`
    public function show($id)
    {
        $bill = Bill::where('id', $id)->first();
        abort_unless(Auth::id() === $bill->user_id, 403);
        return view('bills.bill_details', ['bill' => $bill]);
    }
`
Obviously, this by default will not inform us of a potential attack, but remember that this is only one potential solution.