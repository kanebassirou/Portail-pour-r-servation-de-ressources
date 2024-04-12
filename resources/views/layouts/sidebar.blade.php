@if (auth()->user()->hasRole('admin'))
    <div class="d-flex">
        <div id="nav-bar">
            <input id="nav-toggle" type="checkbox" />
            <div id="nav-header">
                <a id="nav-title" href="#" target="_blank" class="nav-button"><i class="fas fa-user-cog"></i> Admin</a>
                <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
                <hr />
            </div>
            <div id="nav-content">
                <a href="#" class="nav-button"><i class="fas fa-sliders-h"></i><span>Dashboard</span></a>
                <a href="#" class="nav-button"><i class="fas fa-user-tie"></i><span>User Profile</span></a>
                <a href="#" class="nav-button"><i class="fas fa-user-cog"></i>Gérer les Utilisateurs</a>
                <a href="#" class="nav-button"><i class="fas fa-clipboard-list"></i>Gérer ressources</a>
            </div>
            <input id="nav-footer-toggle" type="checkbox" />
            <div id="nav-footer">
                <div id="nav-footer-heading">
                    <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" /></div>
                    <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">{{ auth()->user()->name }}</a><span id="nav-footer-subtitle">Admin</span></div>
                    <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
                </div>
                <div id="nav-footer-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="d-flex">
        <div id="nav-bar">
            <input id="nav-toggle" type="checkbox" />
            <div id="nav-header">
                <a id="nav-title" href="#" target="_blank" class="nav-button"><i class="fas fa-user-cog"></i> User</a>
                <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
                <hr />
            </div>
            <div id="nav-content">

                <a href="#" class="nav-button"><i class="fas fa-sliders-h"></i><span>Dashboard</span></a>
                <a href="#" class="nav-button"><i class="fas fa-user-tie"></i><span> Profile</span></a>
                <a href="#" class="nav-button"><i class="fas fa-user-cog"></i>Vos Reservation</a>
                <a href="#" class="nav-button"><i class="fas fa-envelope"></i>Messages</a>
                <a href="#" class="nav-button"><i class="fas fa-bell"></i>Notification</a>
            </div>
            <input id="nav-footer-toggle" type="checkbox" />
            <div id="nav-footer">
                <div id="nav-footer-heading">
                    <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" /></div>
                    <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">{{ auth()->user()->name }}</a><span id="nav-footer-subtitle">Admin</span></div>
                    <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
                </div>
                <div id="nav-footer-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
@endif
