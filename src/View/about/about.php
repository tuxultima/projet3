<?php 
ob_start();
?>

<div class="aboutfront rounded mt-3 mb-3 border border-info clear-fix">
	<h1 class="text-white text-center p-3">Qui Suis-je ?</h1>
	<br>
	<img src="../../projet3/public/image/gugusse.jpeg" class="float-left">
	<p class="text-white p-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mollis ex et libero tristique suscipit. Duis imperdiet a mi in rhoncus. Phasellus ac diam quis erat commodo rutrum. Duis suscipit diam nec felis gravida semper. Suspendisse posuere purus turpis. Nam mollis ut est eu pretium. Mauris blandit eros ut convallis commodo. Nullam enim purus, aliquet ut posuere sed, scelerisque non mi. Vestibulum vel elementum est, a dignissim turpis. Ut placerat dapibus eros, eget aliquet ante ultrices ac. Proin tempor tellus et enim laoreet, sit amet rhoncus lectus commodo. Nullam iaculis, purus vel tempor porta, lectus dui finibus massa, et ultrices enim sem at tortor. Aenean sit amet viverra magna. Vestibulum quis ligula ut felis eleifend volutpat.<br><br>

Cras rutrum id lectus ut vulputate. Quisque semper, turpis et mollis egestas, eros ligula condimentum tortor, ac sagittis tellus mauris vel orci. In pellentesque vulputate sem, ut congue turpis ullamcorper eu. Nam in magna tortor. Donec arcu urna, laoreet quis posuere ac, luctus et eros. Ut eu rhoncus nibh. Cras pulvinar consequat interdum. Aliquam turpis lectus, lacinia vel odio vitae, dictum aliquam magna. Pellentesque consequat massa odio, quis maximus lorem tristique ac. Sed commodo sem sed risus vestibulum facilisis. Suspendisse egestas auctor ligula, varius posuere mauris blandit sit amet. Etiam sed massa libero. Aliquam id semper velit.<br><br>

Ut et condimentum ligula. Donec viverra lacus ac augue pellentesque congue. Phasellus varius augue sapien, commodo egestas orci ullamcorper vel. Quisque nec est sagittis, tincidunt arcu pulvinar, tincidunt ex. Vivamus fermentum, lorem at auctor interdum, magna urna porttitor sapien, consequat tempor lacus augue iaculis est. Nulla nisl nibh, vestibulum et pharetra ut, pulvinar id metus. Nam in euismod mi. Aliquam lacinia libero non eros ornare, eu ultrices ipsum pharetra.<br><br>

Pellentesque dignissim mattis justo, eu eleifend nunc iaculis eu. Duis id maximus diam, in bibendum ex. Aenean ac porttitor sapien, scelerisque faucibus quam. Integer vel aliquet risus, eu faucibus nisl. Vestibulum blandit mollis arcu et hendrerit. Donec porta risus vitae leo suscipit sollicitudin. Morbi suscipit aliquet nulla non dignissim. Curabitur efficitur nec nibh vel blandit. Morbi sagittis molestie rhoncus. Fusce lacinia, enim consequat fermentum ultrices, turpis nunc imperdiet nisi, sit amet elementum felis elit vel ipsum. Nunc vel dui eros. Aliquam iaculis dignissim orci sit amet sagittis. Suspendisse pellentesque gravida dignissim. In sed volutpat dui. Quisque a nisl faucibus, blandit tellus a, viverra tellus. </p>


</div>





<?php
$content = ob_get_clean();
require('src/View/template.php');
?>