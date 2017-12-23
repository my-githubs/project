<div class="list-group col-md-3 row">
	  <a href="/personal" class="list-group-item active">
	    个人信息编辑
	  </a>
	  <a href="/touch" class="list-group-item">联系客服</a>
	  <a href="#" class="list-group-item">个人收藏</a>
	  <a href="/order/list" class="list-group-item">我的订单</a>
	  <a href="/address" class="list-group-item">收货地址</a>
</div>
<script>
	$(function(){
		$('.list-group-item').click(function(){
			$(this).addClass('active').siblings('.list-group-item').removeClass('active');
		})
		$('.list-group-item').hover(function(){
			$(this).addClass('active');
		},function(){
			$(this).removeClass('active');
		})

	})
</script>