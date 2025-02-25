
@extends("back.base-dash")
@section('main')
                          <div id="goals-controls" class="mb-6">
                              <button class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
                                  <i class="fa-solid fa-plus mr-2"></i>
                                  Add New Goal
                              </button>
                          </div>
                          <div id="goals-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                              <div class="bg-white p-6 rounded-lg border border-neutral-200 shadow-sm">
                                  <div class="flex justify-between items-start mb-4">
                                      <div>
                                          <h3 class="text-lg">Buy a Car</h3>
                                          <p class="text-neutral-600">Target: $10,000</p>
                                      </div>
                                      <div class="flex space-x-2">
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-pen-to-square"></i>
                                          </button>
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <div class="h-2 bg-neutral-100 rounded-full">
                                          <div class="h-2 bg-neutral-800 rounded-full w-[60%]"></div>
                                      </div>
                                      <div class="flex justify-between mt-2 text-sm">
                                          <span>$6,000 saved</span>
                                          <span>60%</span>
                                      </div>
                                  </div>
                                  <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=456" class="w-6 h-6 rounded-full"/>
                                      <span>Added by Sarah</span>
                                  </div>
                              </div>
                              <div class="bg-white p-6 rounded-lg border border-neutral-200 shadow-sm">
                                  <div class="flex justify-between items-start mb-4">
                                      <div>
                                          <h3 class="text-lg">Family Vacation</h3>
                                          <p class="text-neutral-600">Target: $5,000</p>
                                      </div>
                                      <div class="flex space-x-2">
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-pen-to-square"></i>
                                          </button>
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <div class="h-2 bg-neutral-100 rounded-full">
                                          <div class="h-2 bg-neutral-800 rounded-full w-[30%]"></div>
                                      </div>
                                      <div class="flex justify-between mt-2 text-sm">
                                          <span>$1,500 saved</span>
                                          <span>30%</span>
                                      </div>
                                  </div>
                                  <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=789" class="w-6 h-6 rounded-full"/>
                                      <span>Added by John</span>
                                  </div>
                              </div>
                              <div class="bg-white p-6 rounded-lg border border-neutral-200 shadow-sm">
                                  <div class="flex justify-between items-start mb-4">
                                      <div>
                                          <h3 class="text-lg">New Laptop</h3>
                                          <p class="text-neutral-600">Target: $2,000</p>
                                      </div>
                                      <div class="flex space-x-2">
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-pen-to-square"></i>
                                          </button>
                                          <button class="text-neutral-600 hover:text-neutral-900">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <div class="h-2 bg-neutral-100 rounded-full">
                                          <div class="h-2 bg-neutral-800 rounded-full w-[80%]"></div>
                                      </div>
                                      <div class="flex justify-between mt-2 text-sm">
                                          <span>$1,600 saved</span>
                                          <span>80%</span>
                                      </div>
                                  </div>
                                  <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=101" class="w-6 h-6 rounded-full"/>
                                      <span>Added by Emma</span>
                                  </div>
                              </div>
                          </div>
@endsection