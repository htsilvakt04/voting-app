function flash($title = 'message', $message) {
	return session()->flash($title, $message);
}