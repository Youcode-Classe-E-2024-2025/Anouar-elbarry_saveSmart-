@extends("base")
@section("content")
<section id="hero" class=" h-[800px]">
                  <div class="container mx-auto px-4">
                    <div class="flex flex-col md:flex-row items-center gap-12">
                      <div class="flex-1 text-center md:text-left">
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                          Manage Your Finances<br/>
                          <span class="text-indigo-600">With Confidence</span>
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                          Take control of your financial future with our powerful and intuitive platform.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                          <a href="#" class="px-8 py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-lg">
                            Get Started Free
                          </a>
                          <a href="#" class="px-8 py-4 border border-gray-300 rounded-lg hover:border-indigo-600 hover:text-indigo-600 text-lg">
                            Watch Demo <i class="fa-solid fa-play ml-2"></i>
                          </a>
                        </div>
                      </div>
                      <div class="flex-1">
                        <img class="w-full h-auto" src="https://storage.googleapis.com/uxpilot-auth.appspot.com/47d00537e9-974bc0d8b0d31a0c5670.png" alt="modern illustration of person managing finances on laptop, professional, minimalist style, soft colors" >
                      </div>
                    </div>
                  </div>
                </section>
                <section id="features" class="py-20 bg-gray-50">
                  <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center mb-12">Why Choose SaveSmart?</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                      <div id="feature-1" class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fa-solid fa-shield-halved text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Secure Platform</h3>
                        <p class="text-gray-600">Bank-grade encryption and security measures to protect your data.</p>
                      </div>
                      <div id="feature-2" class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fa-solid fa-chart-line text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Real-time Analytics</h3>
                        <p class="text-gray-600">Get insights into your spending patterns and financial health.</p>
                      </div>
                      <div id="feature-3" class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                          <i class="fa-solid fa-mobile-screen text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Mobile First</h3>
                        <p class="text-gray-600">Access your finances anywhere, anytime with our mobile app.</p>
                      </div>
                    </div>
                  </div>
                </section>
                <section id="cta" class="py-20">
                  <div class="container mx-auto px-4">
                    <div class="bg-indigo-600 rounded-2xl p-12 text-center">
                      <h2 class="text-3xl font-bold text-white mb-6">Ready to Take Control?</h2>
                      <p class="text-indigo-100 mb-8 max-w-2xl mx-auto">
                        Join thousands of users who are already managing their finances smarter with FinanceFlow.
                      </p>
                      <a href="#" class="inline-block px-8 py-4 bg-white text-indigo-600 rounded-lg hover:bg-indigo-50 text-lg font-medium">
                        Start Free Trial
                      </a>
                    </div>
                  </div>
                </section>
@endsection