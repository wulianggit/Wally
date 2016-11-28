<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>General</h3>
		<ul class="nav side-menu">

			<li class="{{active_class(if_uri_pattern(['admin/user*']))}}">
				<a><i class="fa fa-user"></i> {{trans('sidebar.user.manager')}} <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: {{active_class(if_uri_pattern(['admin/user*']), 'block', 'none')}}">
					<li class="{{active_class(if_uri_pattern(['admin/user']), 'current-page')}}">
						<a href="{{url('/admin/user')}}">{{trans('sidebar.user.list')}}</a>
					</li>
					<li class="{{active_class(if_uri_pattern(['admin/user/create']), 'current-page')}}">
						<a href="{{url('/admin/user/create')}}">{{trans('sidebar.user.create')}}</a>
					</li>
				</ul>
			</li>

			<li class="{{active_class(if_uri_pattern(['admin/role*']))}}">
				<a><i class="fa fa-check-square"></i> {{trans('sidebar.role.manager')}} <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: {{active_class(if_uri_pattern(['admin/role*']), 'block', 'none')}}">
					<li class="{{ active_class(if_uri_pattern(['admin/role']), 'current-page') }}">
						<a href="{{ url('/admin/role') }}">{{trans('sidebar.role.list')}}</a>
					</li>
					<li class="{{ active_class(if_uri_pattern(['admin/role/create']), 'current-page') }}">
                        <a href="{{ url('/admin/role/create') }}">{{trans('sidebar.role.create')}}</a>
                    </li>
				</ul>
			</li>

			<li class="{{active_class(if_uri_pattern(['admin/permission*']))}}">
				<a><i class="fa fa-th-list"></i> {{trans('sidebar.permission.manager')}} <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: {{active_class(if_uri_pattern(['admin/permission*']), 'block', 'none')}}">
					<li class="{{ active_class(if_uri_pattern(['admin/permission']), 'current-page') }}">
                        <a href="{{ url('/admin/permission') }}">{{trans('sidebar.permission.list')}}</a>
                    </li>
					<li class="{{ active_class(if_uri_pattern(['admin/permission/create']), 'current-page') }}">
                        <a href="{{ url('/admin/permission/create') }}">{{trans('sidebar.permission.create')}}</a>
                    </li>
				</ul>
			</li>

			<li class="{{active_class(if_uri_pattern(['admin/article*','admin/label*','admin/category*']))}}">
				<a><i class="fa fa-book"></i> {{trans('sidebar.article.manager')}} <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="display: {{active_class(if_uri_pattern(['admin/article*','admin/label*','admin/category*']), 'block', 'none')}}">
					<li class="{{ active_class(if_uri_pattern(['admin/category']), 'current-page') }}">
						<a href="{{ url('/admin/category') }}">{{trans('sidebar.article.category')}}</a>
					</li>
					<li class="{{ active_class(if_uri_pattern(['admin/label']), 'current-page') }}">
						<a href="{{ url('/admin/tag') }}">{{trans('sidebar.article.tag')}}</a>
					</li>
					<li class="{{ active_class(if_uri_pattern(['admin/article']), 'current-page') }}">
                        <a href="{{ url('/admin/article') }}">{{trans('sidebar.article.list')}}</a>
                    </li>
					<li class="{{ active_class(if_uri_pattern(['admin/article/create']), 'current-page') }}">
                        <a href="{{ url('/admin/article/create') }}">{{trans('sidebar.article.create')}}</a>
                    </li>
				</ul>
			</li>

		</ul>
	</div>
</div>
