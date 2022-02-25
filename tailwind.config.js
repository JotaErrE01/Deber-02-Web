module.exports = {
	content: ["./public/**/*.{html,js,php}"],
	theme: {
		extend: {
			colors: {
				primary: {
					100: "#f5f5f5",
				},
				secondary: {
					100: "#f5f5f5",
				},
				tertiary: {
					100: "#f5f5f5",
				},
			},
			fontSize: {
				"title": "3rem",
				"subtitle": "2.5rem",
				"logo": "2rem",
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
