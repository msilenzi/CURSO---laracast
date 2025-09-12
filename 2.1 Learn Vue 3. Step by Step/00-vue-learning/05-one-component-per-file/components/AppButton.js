export default {
  template: `
    <button
      class="text-neutral-100 bg-neutral-900 hover:bg-neutral-800 shadow-sm hover:shadow-md rounded-lg py-2 px-3.5 font-medium transition duration-150 ease-in enabled:active:scale-95 enabled:active:shadow-none disabled:bg-neutral-500 disabled:cursor-not-allowed"
    >
      <slot />
    </button>
  `
}
