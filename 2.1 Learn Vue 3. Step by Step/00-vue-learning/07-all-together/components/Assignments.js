import AssignmentList from "./AssignmentList.js";
import AssignmentCreate from "./AssignmentCreate.js";
import TagSelector from "./TagSelector.js";

export default {
  template: `
  <div class="space-y-8">
      <h1 class="text-2xl font-bold">Assignments</h1>
      
      <assignment-create @create="addAssignment" />

      <div class="flex flex-wrap gap-2">
        <tag-selector
          tag="all"
          :currentTag="currentTag"
          @selected="setCurrentTag"
        />

        <tag-selector
          v-for="tag in tags"
          :key="tag"
          :tag="tag"
          :currentTag="currentTag"
          @selected="setCurrentTag"
        />
      </div>

      <assignment-list title="Pending" :assignments="pending" />
      <assignment-list title="Completed" :assignments="completed" />
    </div>
  `,

  data() {
    return {
      assignments: [
        { id: 1, name: "Finish project", completed: true, tag: "math" },
        { id: 2, name: "Read chapter 4", completed: false, tag: "literature" },
        { id: 3, name: "Read chapter 5", completed: false, tag: "literature" },
      ],
      currentTag: "all",
    };
  },

  computed: {
    completed() {
      return this.assignments.filter(
        (a) =>
          a.completed &&
          (this.currentTag === "all" || a.tag === this.currentTag)
      );
    },

    pending() {
      return this.assignments.filter(
        (a) =>
          !a.completed &&
          (this.currentTag === "all" || a.tag === this.currentTag)
      );
    },

    tags() {
      return new Set(this.assignments.map(({ tag }) => tag));
    },
  },

  components: {
    AssignmentList,
    AssignmentCreate,
    TagSelector,
  },

  methods: {
    addAssignment(name, tag) {
      this.assignments.push({
        name,
        tag,
        completed: false,
        id: this.assignments.at(-1).id + 1,
      });
    },

    setCurrentTag(newCurrentTag) {
      this.currentTag = newCurrentTag;
    },
  },
};
