<h3>Hi: {{ $account->name}}</h3>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium accusantium sit quia deleniti qui nostrum vitae mollitia ullam officiis. Laboriosam rem beatae excepturi, praesentium corrupti accusantium. Recusandae, eius! Doloremque, aliquid.</p>


<p>
    <a href="{{ route('account.verify', $account->email) }}">Click</a>
</p>