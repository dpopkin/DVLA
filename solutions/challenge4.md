# What:
This is an [information disclosure](https://portswigger.net/web-security/information-disclosure), leading to the discovery of a logic error:
1. Go any edit page and then try to access the admin page. You'll see an error that accidentally discloses the issue nicely.
2. From there, we can easily change the email address in the profile page.

# Why
This is caused by multiple issues. First, basing admin validation off an email address without verification of ownership is not a good idea. Second, the .test TLD is not real. But using the `email` [validator](https://laravel.com/docs/8.x/validation#rule-email) by itself won't check that and as an added bonus, earlier versions of Laravel (5.7 and below) using the `email` validation rule did not [support](https://laravel.com/docs/5.7/validation#rule-email) any additional argments for checking if the email was invalid at DNS, an RFC edge case (did you know @localhost is a [valid](https://superuser.com/questions/635870/can-i-test-my-local-e-mail-server-without-setting-up-a-domain) email address?). So there might be a few legacy applications floating around with this issue. Finally there was the debug code left behind that nicely told us of the issue in the first place.

# Fix:
Obviously the first thing to do is to remove the error code. But what about after? Per client orders, we can't just remove the email authentication entirely. But, in the case of `laravel[.]test`, you need only add `email:dns` to confirm it's not a valid TLD. However, what if the email was a valid DNS record? We'd need to verify ownership of the email with something like the email verification [option](https://laravel.com/docs/8.x/verification) that Laravel provides. 