                <!-- footer -->
                <footer id="footer" class="fixed-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12 footer-border-purple py-3 footer-border">
                            <div class="d-flex justify-content-around footer">
                                <a href="{{ route('welcome') }}" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('welcome') ? 'active' : '' }}">
                                    <i class="fas fa-home"></i>
                                </a>
                                <a href="" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('user.wallet') ? 'active' : '' }}">
                                    <i class="fas fa-wallet"></i>
                                </a>
                                @guest
                                <a href="" class="text-decoration-none d-block" id="registerBtn">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                                @endguest
                                <a href="" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('user.promo') ? 'active' : '' }}">
                                    <i class="fas fa-gift"></i>
                                </a>
                                <a href="" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('user.contact') ? 'active' : '' }}">
                                    <i class="fas fa-phone-volume"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer -->

