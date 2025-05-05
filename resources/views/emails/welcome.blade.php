<h2 style="color: green">Hi {{$user->name}},</h2>
<p>Welcome to <strong>{{ config('app.name') }}</strong> - Your online grocery store!</p>
<p>From fresh produce to household essentials. we've get everything you need - delivered right to your door.</p>
<p style="margin: 20px 0;">As a welcome gift, enjoy a special discount on your first order!</p>
<a href="{{route('shop.index')}}" style="display:inline-block; padding: 12px 25px; background-color: #f8c519; color: white; text-decoration:none; border-radius: 5px">Start Shopping</a>
<p style="margin-top: 30px; font-size: 0.9em; color: #888;">Need help? Our support team is always here for you.</p>
<p style="margin-top: 10px;">Happy Shopping!<br> The {{ config('app.name') }} Team</p>
