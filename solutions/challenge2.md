# What/how to:
This is an issue known as [mass assignment](https://en.wikipedia.org/wiki/Mass_assignment_vulnerability). Mass assignment involves passing data in the request that wasn't expected but will be parsed and have its value updated. So adding `price=1` to the update request from any user will also update price in addition to anything else. One *possible* method to exploit this is:
1. If you are using Chrome, go to the developer console > network tab and find the post request. You can right click/command click it and then select copy > copy as cUrl (or your preferred) method. Firefox users can simply use the `edit and resend option` and add the `price` attribute to the request body.
2. Use the preferred method (cUrl, fetch, postman) to add the `price` attribute.
3. Refresh the index page to see the changes.

# Why:
In the BillController->update() method, we first validate the input of only description and aisle using ItemRequest, then we accept ALL data that is fillable under the Item model. 

# Fix:
Because price is supposed to be editable by a super admin, we can't just remove the `price` attribute from the fillable section in the Item model and call it a day. So instead, we should check if any abmormal inputs exist and make sure the user is authorized to make that change. Thankfully Laravel includes the authorize method in the ItemRequest for this very reason. For example, and the sake of simplicity, lets say the super admin will always have an ID of 1, in which case we can use something similar to this:

    public function authorize()
    {
        if(request()->input('price')) {
            return Auth::id() === 1;
        }
        return true;
    }
