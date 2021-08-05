<x-app-layout>
        <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to our site.
                    <div class="w-full flex justify-center">
                        <div class="mr-8">

                        <h1 class="font-medium max-w-xl mx-auto pt-10 pb-4">Profile</h1>
                      <div class="bg-white max-w-xl mx-auto border border-gray-200" x-data="{selected:null}">
                              <ul class="shadow-box">

                              <li class="relative border-b border-gray-200">

                                <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>Detail</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                </button>

                                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                      <div class="p-6">
                                        <p>Profile information should be updated when changed.
                                            <ul class="list-disc ml-10">
                                                <li>Click on your name (top right)</li>
                                                <li>Select Profile</li>
                                            </ul>
                                        </p>
                                        <div class="mb-3">&nbsp;</div>
                                        <p>Address: You can not order until you've added a delivery address and it has been approved by our admin.
                                            <ul class="list-disc ml-10">
                                                <li>Click on your name (top right)</li>
                                                <li>Select Profile</li>
                                                <li>Click on Address</li>
                                                <li>Click on the <span class="text-3xl">+</span>
                                                </li>
                                            </ul>
                                        </p>
                                        <div class="mb-3">&nbsp;</div>
                                        <p>Password: Update your password when needed
                                            <ul class="list-disc ml-10">
                                                <li>Click on your name (top right)</li>
                                                <li>Select Profile</li>
                                                <li>Click on Password</li>
                                                </li>
                                            </ul>
                                        </p>
                                  </div>

                              </li>


                              <li class="relative border-b border-gray-200">

                                  <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>Team</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                                  </button>

                                  <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                      <div class="p-6">
                                          <p>Everyone you invite will be listed under your team should they accept your invitation. Members to this site can only be invited by other members. You will earn R10 per item they purchase.</p>
                                      </div>
                                  </div>
                              </li>


                              <li class="relative border-b border-gray-200">

                                  <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>Orders</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                                  </button>

                                  <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                      <div class="p-6">
                                        <p>View Orders
                                            <ul class="list-disc ml-10">
                                                <li>Click on the orders icon</li>
                                                <li>Orders will be listed</li>
                                                <li>You will be able to edit your orders</li>
                                                <li>Once you satisfied with your order you can click on the 'confirmation' icon</li>
                                            </ul>
                                        </p>
                                        <div class="mb-3">&nbsp;</div>
                                        <p>Create an order
                                            <ul class="list-disc ml-10">
                                                <li>Click on the orders icon</li>
                                                <li>Click on 'Create'</li>
                                                <li>Select an approved address</li>
                                                <li>Click 'Create'</li>
                                            </ul>
                                        </p>
                                        <div class="mb-3">&nbsp;</div>
                                        <p>Edit your order
                                            <ul class="list-disc ml-10">
                                                <li>Type the product name ('left')</li>
                                                <li>Select the correct product ('right')</li>
                                                <li>Change quantity by using the arrows or delete it</li>
                                                <li>Finaly click on 'Update'</li>
                                            </ul>
                                        </p>
                                        <div class="mb-3">&nbsp;</div>
                                      </div>
                                  </div>

                              </li>

                                  </ul>
                          </div>
                        </div>
                        <div class="ml-8">

                        <h1 class="font-medium max-w-xl mx-auto pt-10 pb-4">Terms of Use</h1>
                      <div class="bg-white max-w-xl mx-auto border border-gray-200">
                              <ul class="shadow-box">

                              <li class="relative border-b border-gray-200" x-data="{selected:null}">

                                  <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>What we expect</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                                  </button>

                                  <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                      <div class="p-6">
                                          <p>We are third parties and adhere to the strictest code of conduct and anonymity. We expect the same from you! This site was created to support responsible adults. We are professionals in the industry who believes that you have the choice. Should you not adhere to any of our rules, you will be removed and held liable. </p>
                                      </div>
                                  </div>

                              </li>


                              <li class="relative border-b border-gray-200" x-data="{selected:null}">

                                  <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>What you can expect</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                                  </button>

                                  <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                      <div class="p-6">
                                          <p>Total anonymity, fare prices and the best quality products. All Pretoria deliveries should be delivered on the same day as paid. </p>
                                      </div>
                                  </div>

                              </li>


                              <li class="relative border-b border-gray-200" x-data="{selected:null}">

                                  <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                                      <div class="flex items-center justify-between">
                                          <span>Why do I get credit?</span>
                                          <span class="ico-plus"></span>
                                      </div>
                                                  </button>

                                  <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                      <div class="p-6">You get R10 on every item a team member buys as a thank you from us. Covid has created a state of despair for most people and the incentive is just our way of helping. You can apply this credit to you purchase or opt for a cash out. Some of our members earn a monthly income from their team members.</p>
                                      </div>
                                  </div>

                              </li>

                                  </ul>
                          </div>
                        </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
