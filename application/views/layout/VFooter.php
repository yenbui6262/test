</body>
<script type="text/javascript">
{if isset($message)}
$(document).ready(function () {
	fireToast("{$message.type}","{$message.title}");	
})
{/if}
</script>
</html>