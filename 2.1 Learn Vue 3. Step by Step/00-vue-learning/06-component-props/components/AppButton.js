export default {
  template: `
    <button
      :class="{
        'shadow-xs enabled:hover:shadow-md rounded-lg py-2 px-3.5 font-medium transition duration-150 ease-in enabled:active:scale-95 enabled:active:shadow-none disabled:cursor-not-allowed': true,
        'text-blue-50 bg-blue-500 shadow-blue-500 hover:bg-blue-600  disabled:bg-blue-300': variant === 'primary',
        'text-red-50 bg-red-500 shadow-red-500 hover:bg-red-600  disabled:bg-red-300': variant === 'alert',
        'text-green-50 bg-green-500 shadow-green-500 hover:bg-green-600  disabled:bg-green-300': variant === 'success',
      }"
      :disabled="processing"
    >
      <slot />
    </button>
  `,

  props: {
    // nombre: tipo o nombre: { type, default, ... }
    variant: {
      type: String,
      default: 'primary',
    },
    processing: {
      type: Boolean,
      default: false,
    },
  }
}
