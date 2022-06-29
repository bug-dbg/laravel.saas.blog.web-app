<div class='items-center justify-center'>  
 @forelse ($comments as $comment)
      <div class="border p-6 shadow-md w-9/12 bg-white rounded-md mb-4">
          <div class="flex w-full items-center justify-between border-b pb-3">
              <div class="flex items-center space-x-3">
                  <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                  <div class="text-lg font-bold text-slate-700">{{$comment->user->name}}</div>
              </div>
              <div class="flex items-center space-x-8">
                  <div class="text-xs text-neutral-500">{{$comment->creation_date->diffForHumans()}}</div>
              </div>
          </div>

          <div class="mt-4 mb-6">
              <div class="text-sm text-neutral-600">{{$comment->comment}}</div>
          </div>

          <div>
              <div class="flex items-center justify-between text-slate-500">
                  <div class="flex space-x-4 md:space-x-8">
                      <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                          </svg>
                          <span>4</span>
                      </div>
                      <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                        <span>4</span>
                    </div>
                  </div>
              </div>
          </div>
      </div>


      {{-- 
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 105.01"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>dislike</title><path class="cls-1" d="M4,61.65H32.37a4,4,0,0,0,4-4V4a4.05,4.05,0,0,0-4-4H4A4,4,0,0,0,0,4V57.62a4,4,0,0,0,4,4ZM62.16,98.71a7.35,7.35,0,0,0,4.07,5.65,8.14,8.14,0,0,0,5.56.32,15.53,15.53,0,0,0,5.3-2.71,26.23,26.23,0,0,0,9.72-18.86,57.44,57.44,0,0,0-.12-8.35c-.17-2-.42-4-.76-6.15h20.2a21.57,21.57,0,0,0,9.1-2.32,14.87,14.87,0,0,0,5.6-4.92,12.59,12.59,0,0,0,2-7.52,18.1,18.1,0,0,0-1.82-6.92,21.87,21.87,0,0,0,.54-8.39,9.68,9.68,0,0,0-2.78-5.67,25.28,25.28,0,0,0-1.4-9.44,19.9,19.9,0,0,0-4.5-7,28.09,28.09,0,0,0-.9-5A17.35,17.35,0,0,0,109.5,6h0C106.07,1.14,103.33,1.25,99,1.43c-.61,0-1.26.05-2.26.05H57.39a19.08,19.08,0,0,0-8.86,1.78,20.9,20.9,0,0,0-7,6.06L41,11V56.86l2,.54c5.08,1.37,9.07,5.7,12.16,10.89a76,76,0,0,1,7,16.64V98.2l.06.51Zm6.32.78a2.13,2.13,0,0,1-1-1.57V84.55l-.12-.77a82.5,82.5,0,0,0-7.61-18.24C56.4,59.92,52,55.1,46.37,52.87V11.94a14.87,14.87,0,0,1,4.56-3.88,14.14,14.14,0,0,1,6.46-1.21H96.73c.7,0,1.61,0,2.47-.07,2.57-.11,4.2-.17,5.94,2.28v0a12.12,12.12,0,0,1,1.71,3.74,24.63,24.63,0,0,1,.79,5l.83,1.76a15,15,0,0,1,3.9,5.75,21.23,21.23,0,0,1,1,8.68l-.1,1.59,1.36.84a4.09,4.09,0,0,1,1.64,3,17.44,17.44,0,0,1-.68,7.12l.21,1.94A13.16,13.16,0,0,1,117.51,54a7.34,7.34,0,0,1-1.17,4.39,9.61,9.61,0,0,1-3.59,3.12,16,16,0,0,1-6.71,1.7H79.51l.6,3.18a85.37,85.37,0,0,1,1.22,8.78,51.11,51.11,0,0,1,.13,7.56,20.78,20.78,0,0,1-7.62,14.95,10.29,10.29,0,0,1-3.41,1.78,3,3,0,0,1-2,0ZM22.64,19.71a5.13,5.13,0,1,0-5.13-5.13,5.13,5.13,0,0,0,5.13,5.13Z"></path></svg>
        --}}
  @empty
  <br />
  there are no comments in this blog yet
  @endforelse
</div>
