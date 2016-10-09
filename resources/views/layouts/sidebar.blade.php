<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>General</h3>
		<ul class="nav side-menu">
			<li class="{{active_class(if_uri_pattern(['admin/user*']))}}">
				<a><i class="fa fa-user"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: {{active_class(if_uri_pattern(['admin/user*']), 'block', 'none')}}">
					<li class="{{active_class(if_uri_pattern(['admin/user']), 'current-page')}}">
						<a href="{{url('/admin/user')}}">用户列表</a>
					</li>
					<li class="{{active_class(if_uri_pattern(['admin/user/create']), 'current-page')}}">
						<a href="{{url('/admin/user/create')}}">添加用户</a>
					</li>
				</ul>
			</li>
			<li class="{{active_class(if_uri_pattern(['admin/role*']))}}">
				<a><i class="fa fa-check-square"></i> 角色管理 <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="form.html">角色列表</a></li>
					<li><a href="form_advanced.html">添加角色</a></li>
				</ul>
			</li>
			<li class="{{active_class(if_uri_pattern(['admin/permission*']))}}">
				<a><i class="fa fa-th-list"></i> 权限管理 <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="general_elements.html">权限列表</a></li>
					<li><a href="media_gallery.html">添加权限</a></li>
				</ul>
			</li>
			<li class="{{active_class(if_uri_pattern(['admin/article*']))}}">
				<a><i class="fa fa-book"></i> 文章管理 <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="tables.html">文章列表</a></li>
					<li><a href="tables_dynamic.html">添加文章</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>