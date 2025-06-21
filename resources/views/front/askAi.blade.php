@extends('layouts.app')

@section('content')
<div class="impx-slide-container style1 resto" style="height: 700px;">
	<div class="impx-slideshow-fw">
		<div class="impx-hero-resto uk-position-relative  uk-background-fixed uk-background-center-center uk-height-1-1">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-grid uk-flex uk-flex-center uk-flex-middle">
					<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-1@m  uk-width-1-1@s uk-position-center uk-margin-large-top">
						<div class="impx-slide-fw-caption resto-caption uk-position-relative uk-position-z-index uk-text-center uk-light">
							<!-- intro -->
							<h1 class="impx-text-shadow">Chat with AI</h1>
							<p class="uk-margin-remove impx-text-shadow uk-text-lead">Search for a room, create booking, check room availability!</p>
							<div class="uk-margin">
								<i class="fa fa-coffee impx-slide-icon impx-text-white"></i>
								<i class="fa fa-cutlery impx-slide-icon impx-text-white"></i>
								<i class="fa fa-glass impx-slide-icon impx-text-white"></i>
							</div>
							<!-- intro end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="uk-padding vert uk-padding-remove-horizontal">
    <div class="uk-container">
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-1">
                <!-- FAQ Section -->
                <div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge">
                    <div class="uk-card-body uk-padding-large uk-margin-large-top">
                        <h2 class="uk-heading-primary uk-text-center">Useful Prompts</h2>
                        <div class="uk-grid uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-1@m uk-margin-large-top" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body">
                                    <h3 class="uk-card-title">Room Search</h3>
                                    <ul class="uk-list uk-list-bullet">
                                        <li>Show me available rooms with room type "<a href="#" class="showAllRooms" class="">View All Rooms</a>"</li>
                                    </ul>
                                </div>

                                <!-- Rooms Modal -->
                                <div id="roomsModal" class="uk-modal" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                        <h2 class="uk-modal-title">Available Rooms</h2>
                                        <div id="roomsTable" class="uk-overflow-auto">
                                            <table class="uk-table uk-table-striped uk-table-hover uk-table-small">
                                                <thead>
                                                    <tr>
                                                        <th class="uk-width-expand">Room Type</th>
                                                        <th class="uk-width-small">Price/night</th>
                                                        <th class="uk-width-small">Max Guests</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="roomsTableBody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body">
                                    <h3 class="uk-card-title">Room Details</h3>
                                    <ul class="uk-list uk-list-bullet">
                                        <li>Show me room details for room type "<a href="#" class="showAllRooms">View Room Type</a>"</li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body">
                                    <h3 class="uk-card-title">Room Availability</h3>
                                    <ul class="uk-list uk-list-bullet">
                                        <li>Show me all available rooms</li>
                                        <li>Show me available rooms for room type "<a href="#" class="showAllRooms">View Room Type</a>"</li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body">
                                    <h3 class="uk-card-title">Make a Reservation</h3>
                                    <ul class="uk-list uk-list-bullet">
                                        Make a reservation for following:
                                        <li>email: xyz@gmail.com</li>
                                        <li>name: XYZ</li>
                                        <li>check in: sometime</li>
                                        <li>check out: sometime</li>
                                        <li>room type: xyz</li>
                                        <li>guests: 2</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Section -->
                <div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge uk-margin-large-bottom">
                    <div class="uk-card-body uk-padding-large">
                        <div class="uk-grid uk-grid-large" data-uk-grid>
                            <div class="uk-width-1-1">
                                <!-- Chat Container -->
                                <div class="chat-container uk-margin-large-bottom" id="chatHistory">
                                    <!-- Welcome Message -->
                                    <div class="chat-message ai-message">
                                        <div class="message-content">
                                            <p>Hi there! I'm here to assist you with your hotel reservations. How can I help you today?</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Chat Input -->
                                <div class="chat-input-container uk-margin-large-top">
                                    <form class="uk-form-stacked groq-form">
                                        <div class="uk-grid-small uk-flex-middle uk-grid" data-uk-grid>
                                            <div class="uk-width-expand">
                                                <div class="uk-inline">
                                                    <span class="uk-form-icon" data-uk-icon="icon: message"></span>
                                                    <input class="uk-input uk-border-rounded" style="width: 1200px" name="prompt" id="prompt" type="text" placeholder="Type your message here...">
                                                </div>
                                            </div>
                                            <div class="uk-width-auto">
                                                <button class="uk-button uk-button-primary uk-border-rounded" type="submit">
                                                    Send
                                                </button>
                                            </div>
                                            <div class="uk-margin-small-top uk-text-right">
                                                <a href="javascript:void(0);" id="clearChatBtn" type="button">
                                                    Clear Chat
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge">
                    <div class="uk-card-body uk-padding-large">
                        <h2 class="uk-heading-primary uk-text-center">What You Can Ask About</h2>
                        <div class="uk-grid uk-child-width-1-2@m uk-child-width-1-1@s uk-margin-large-top" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                    <i class="fa fa-bed fa-2x uk-text-primary uk-margin-small-bottom"></i>
                                    <h3 class="uk-card-title">Room Availability</h3>
                                    <p>Check room types and availability for any dates</p>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                    <i class="fa fa-usd fa-2x uk-text-primary uk-margin-small-bottom"></i>
                                    <h3 class="uk-card-title">Search for a Room</h3>
                                    <p>Get available room information</p>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                    <i class="fa fa-cutlery fa-2x uk-text-primary uk-margin-small-bottom"></i>
                                    <h3 class="uk-card-title">Search for a Room Details</h3>
                                    <p>Room details with fresh images and description</p>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                    <i class="fa fa-car fa-2x uk-text-primary uk-margin-small-bottom"></i>
                                    <h3 class="uk-card-title">Reservation</h3>
                                    <p>Create a reservation quickly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<style>
    .chat-container {
        max-height: 600px;
        overflow-y: auto;
        padding: 25px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .chat-container::-webkit-scrollbar {
        width: 8px;
    }
    
    .chat-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    .chat-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    
    .chat-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    
    .chat-message {
        margin-bottom: 25px;
        width: 100%;
    }
    
    .user-message {
        text-align: right;
    }
    
    .ai-message {
        text-align: left;
    }
    
    .message-content {
        display: inline-block;
        max-width: 80%;
        padding: 20px 25px;
        border-radius: 25px;
        position: relative;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    
    .user-message .message-content {
        background-color: #4a90e2;
        color: white;
        margin-right: 0;
        margin-left: auto;
    }
    
    .ai-message .message-content {
        background-color: #ffffff;
        color: #333;
        margin-left: 0;
        margin-right: auto;
    }
    
    .message-time {
        font-size: 0.75em;
        color: #6c757d;
        margin-top: 8px;
        display: block;
        text-align: right;
    }
    
    .chat-input-container {
        position: sticky;
        bottom: 0;
        background: white;
        padding: 20px;
        border-top: 1px solid #eee;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .uk-input {
        width: calc(100% - 40px);
        border-radius: 25px;
        padding: 12px 20px;
        border: 1px solid #e9ecef;
    }
    
    .uk-button {
        width: 40px;
        height: 40px;
        padding: 0;
        border-radius: 50%;
        background: #4a90e2;
        color: white;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .uk-button:hover {
        background: #337ab7;
        transform: scale(1.05);
    }
</style>

<script>
    // Helper function to save chat history to cookie
    function saveChatHistory() {
        const chatHistory = document.querySelector('.chat-container');
        const messages = Array.from(chatHistory.children)
            .map(msg => msg.outerHTML)
            .join('');
        
        // Save to cookie with 7 days expiration
        const date = new Date();
        date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
        document.cookie = `chat_history=${encodeURIComponent(messages)}; expires=${date.toUTCString()}; path=/`;
    }

    // Helper function to load chat history from cookie
    function loadChatHistory() {
        const name = "chat_history=";
        const decodedCookie = decodeURIComponent(document.cookie);
        const ca = decodedCookie.split(';');
        
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // Load chat history when page loads
    window.addEventListener('load', () => {
        const savedHistory = loadChatHistory();
        if (savedHistory) {
            const chatContainer = document.querySelector('.chat-container');
            chatContainer.innerHTML = savedHistory;
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    });

    // Get chat container reference
    const chatContainer = document.querySelector('.chat-container');
    
    // Add loading spinner
    const loadingSpinner = '<div class="uk-text-center uk-margin-small-top"><div uk-spinner></div></div>';

    // Function to add message to chat
    function addMessage(message, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `chat-message ${isUser ? 'user-message' : 'ai-message'}`;
        messageDiv.innerHTML = `
            <div class="message-content">
                <p>${message}</p>
            </div>
        `;
        chatContainer.appendChild(messageDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
        
        // Save chat history after adding message
        saveChatHistory();
    }

    // Handle show all rooms click using event delegation
    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('showAllRooms')) {
            e.preventDefault();
            
            // Show loading spinner
            UIkit.modal('#roomsModal').show();
            document.querySelector('#roomsTableBody').innerHTML = '<tr><td colspan="3" class="uk-text-center"><div uk-spinner></div></td></tr>';
            
            try {
                // Get all available rooms
                const response = await fetch('/api/rooms');
                const rooms = await response.json();
                
                // Clear loading spinner
                document.querySelector('#roomsTableBody').innerHTML = '';
                
                // Add room rows
                rooms.forEach(room => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${room.room_type}</td>
                        <td>RM ${room.price}/night</td>
                        <td>${room.capacity}</td>
                    `;
                    document.querySelector('#roomsTableBody').appendChild(row);
                });
            } catch (error) {
                document.querySelector('#roomsTableBody').innerHTML = `
                    <tr>
                        <td colspan="3" class="uk-text-center uk-text-danger">
                            Error fetching room information. Please try again.
                        </td>
                    </tr>
                `;
            }
        }
    });

    // Handle form submission
    document.querySelector('.groq-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const form = this;
        const input = form.querySelector('#prompt');
        const button = form.querySelector('button[type="submit"]');
        
        // Get user message
        const userMessage = input.value.trim();
        
        // Validate input
        if (!userMessage) {
            $.notify('Please enter a message', 'error');
            return;
        }

        // Add user message
        addMessage(userMessage, true);
        
        // Disable input and button
        input.disabled = true;
        button.disabled = true;
        button.innerHTML = loadingSpinner;
        
        try {
            // Send request to AI
            const response = await fetch('/groq-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                body: JSON.stringify({ prompt: userMessage })
            });

            // Get response
            const data = await response.json();

            if (response.ok) {
                // Add AI response
                addMessage(data.response || 'I apologize, but I couldn\'t understand your request.', false);
                input.value = '';
            } else {
                addMessage('Sorry, I encountered an error. Please try again.', false);
                $.notify('Error: ' + data.error || 'Something went wrong', 'error');
            }
        } catch (error) {
            addMessage('Sorry, I encountered an error. Please try again.', false);
            $.notify('Error: ' + error.message, 'error');
        } finally {
            // Re-enable input and button
            input.disabled = false;
            button.disabled = false;
            button.innerHTML = 'Send';
        }
    });

    // Clear chat and cookie
    document.getElementById('clearChatBtn').addEventListener('click', function () {
        const chatContainer = document.querySelector('.chat-container');

        // Clear all messages
        chatContainer.innerHTML = '';

        // Optionally re-add welcome message
        const welcome = document.createElement('div');
        welcome.className = 'chat-message ai-message';
        welcome.innerHTML = `
            <div class="message-content">
                <p>Hi there! I'm here to assist you with your hotel reservations. How can I help you today?</p>
            </div>
        `;
        chatContainer.appendChild(welcome);

        // Remove cookie by setting expiry in the past
        document.cookie = 'chat_history=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    });

</script>
@endsection
