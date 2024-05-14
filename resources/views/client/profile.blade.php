<!-- Profile 1 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 gy-lg-0">
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="card widget-card border-light shadow-sm">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="/client/images/avatar/avatarDefault.gif" class="img-fluid rounded-circle"
                                        alt="">
                                </div>
                                <h5 class="text-center mb-1">{{ $user->name }}</h5>
                                <p class="text-center text-secondary mb-4">{{ $user->role }}</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Followers</h6>
                                        <span>7,854</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Following</h6>
                                        <span>5,987</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Friends</h6>
                                        <span>4,620</span>
                                    </li>
                                </ul>
                                <div class="d-grid m-0">
                                    <button class="btn btn-outline-primary" type="button">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="card widget-card border-light shadow-sm">
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs" id="profileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#overview-tab-pane" type="button" role="tab"
                                    aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="email-tab" data-bs-toggle="tab"
                                    data-bs-target="#email-tab-pane" type="button" role="tab"
                                    aria-controls="email-tab-pane" aria-selected="false">Emails</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                    data-bs-target="#password-tab-pane" type="button" role="tab"
                                    aria-controls="password-tab-pane" aria-selected="false">Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-4" id="profileTabContent">
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                aria-labelledby="overview-tab" tabindex="0">
                                <h5 class="mb-3">About</h5>
                                <p class="lead mb-3">Ethan Leo is a seasoned and results-driven Project Manager who
                                    brings experience and expertise to project management. With a proven track record of
                                    successfully delivering complex projects on time and within budget, Ethan Leo is the
                                    go-to professional for organizations seeking efficient and effective project
                                    leadership.</p>
                                <h5 class="mb-3">Profile</h5>
                                <div class="row g-0">
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">First Name</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">Ethan</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Last Name</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">Leo</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Education</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">M.S Computer Science</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Address</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">Mountain View, California</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Country</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">United States</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Job</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">Project Manager</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Company</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">GitHub Inc</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Phone</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">+1 (248) 679-8745</div>
                                    </div>
                                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                        <div class="p-2">Email</div>
                                    </div>
                                    <div
                                        class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                        <div class="p-2">leo@example.com</div>
                                    </div>
                                </div>
                            </div>
                            {{-- Profile --}}
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <form action="#!" class="row gy-3 gy-xxl-4">
                                    <div class="col-12">
                                        <div class="row gy-2">
                                            <label class="col-12 form-label m-0">Profile Image</label>
                                            <div class="col-12">
                                                <img src="client/images/avatar/avatarDefault.gif" class="img-fluid"
                                                    alt="Luna John">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="fullname"
                                            value="{{ $user->name }}">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email"
                                            value="{{ $user->email }}">
                                    </div>
                                   
                                    <div class="col-12 col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            value="{{ $user->address }}">
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="numberphone" class="form-label">Number phone</label>
                                        <input type="text" class="form-control" id="numberphone"
                                            value="{{ $user->numberphone }}">
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="inputYouTube" class="form-label"></label>
                                        <input type="text" class="form-control" id="inputYouTube"
                                            value="https://www.youtube.com/EthanLeo">
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="inputYouTube" class="form-label">YouTube</label>
                                        <input type="text" class="form-control" id="inputYouTube"
                                            value="https://www.youtube.com/EthanLeo">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="inputX" class="form-label">X</label>
                                        <input type="text" class="form-control" id="inputX"
                                            value="https://twitter.com/EthanLeo">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="inputFacebook" class="form-label">Facebook</label>
                                        <input type="text" class="form-control" id="inputFacebook"
                                            value="https://www.facebook.com/EthanLeo">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="inputLinkedIn" class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" id="inputLinkedIn"
                                            value="https://www.linkedin.com/EthanLeo">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="email-tab-pane" role="tabpanel"
                                aria-labelledby="email-tab" tabindex="0">
                                <form action="#!">
                                    <fieldset class="row gy-3 gy-md-0">
                                        <legend class="col-form-label col-12 col-md-3 col-xl-2">Email Alerts</legend>
                                        <div class="col-12 col-md-9 col-xl-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="emailChange">
                                                <label class="form-check-label" for="emailChange">
                                                    Email Changed
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="passwordChange">
                                                <label class="form-check-label" for="passwordChange">
                                                    Password Changed
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="weeklyNewsletter">
                                                <label class="form-check-label" for="weeklyNewsletter">
                                                    Weekly Newsletter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="productPromotions">
                                                <label class="form-check-label" for="productPromotions">
                                                    Product Promotions
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="password-tab-pane" role="tabpanel"
                                aria-labelledby="password-tab" tabindex="0">
                                <form action="#!">
                                    <div class="row gy-3 gy-xxl-4">
                                        <div class="col-12">
                                            <label for="currentPassword" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" id="currentPassword">
                                        </div>
                                        <div class="col-12">
                                            <label for="newPassword" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="newPassword">
                                        </div>
                                        <div class="col-12">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmPassword">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
