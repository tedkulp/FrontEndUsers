<!-- forgot password template -->
{$startform}
{$title}
{if !empty($message) }
  {if !empty($error) }
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
<p>{$lostpw_message}</p>
<p>{$prompt_username}&nbsp;{$input_username}</p>
<p>{$hidden}{$submit}&nbsp{$cancel}</p>
{$endform}
<!-- forgot password template --> 
