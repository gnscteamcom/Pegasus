{include file='sections/head.tpl'}
{literal}
<script>
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#basic-modal a').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
});
</script>
{/literal}
    	<!--<bd>--> 
        <div id="bd" class="bkcnt bkcnt_int br1px brdr10px clf"> 
            <!--<bkbnrc_3>--> 
			{if $msConfig.ads.300x250 != ""}
            <div class="bkbnrc_2 bkbnrc_3 br1px brdr10px clf mgbot15px"> 
                <div class="bnrlft f_left w300px"> 
                   
				    {$msConfig.ads.300x250|unescape} 
                
				</div> 
                <div class="bnrcnt f_left w300px"> 
                
					{$msConfig.ads.300x250|unescape} 
 
				</div> 
                <div class="bnrrgt f_left w300px"> 
                
					{$msConfig.ads.300x250|unescape}</td> 
				
				</div> 
            </div>
			{/if} 
			
				<center>{$msAviso}</center>
				            
            </div> 
            <!--</content>--> 
        </div> 
        <!--</bd>--> 
{include file='sections/footer.tpl'}