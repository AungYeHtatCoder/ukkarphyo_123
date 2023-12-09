                <!-- footer -->
                <footer id="footer" class="fixed-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12 footer-border-purple pt-3 pb-1 footer-border">
                            <div class="d-flex justify-content-around footer">
                                <a href="{{ route('welcome') }}" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('welcome') ? 'active' : '' }}">
                                    <i class="fas fa-home"></i>
                                    <small class="mt-2 d-block">ပင်မ</small>
                                </a>
                                {{-- <a href="" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('user.wallet') ? 'active' : '' }}">
                                    <i class="fas fa-wallet"></i>
                                    <small class="mt-2 d-block">ပိုက်ဆံအိတ်</small>
                                </a> --}}
                                {{-- @guest
                                <a href="" class="text-decoration-none d-block" id="registerBtn">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                                @endguest --}}
                                <a href="{{ route('promotion') }}" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('promotion') ? 'active' : '' }}">
                                    <i class="fas fa-gift"></i>
                                    <small class="mt-2 d-block">ပရိုမိုရှင်း</small>
                                </a>
                                <a href="{{ route('contact') }}" class="text-decoration-none d-block footer-link {{ Route::currentRouteNamed('contact') ? 'active' : '' }}">
                                    <i class="fas fa-phone-volume"></i>
                                    <small class="mt-2 d-block">ဆက်သွယ်ရန်</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer -->

