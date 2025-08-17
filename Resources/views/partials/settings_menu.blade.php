<li @if (Route::is('mailboxes.customapp'))class="active" @endif><a href="{{ route('mailboxes.customapp', ['id'=>$mailbox->id]) }}"><i class="glyphicon glyphicon-cloud"></i> Custom App</a></li>
