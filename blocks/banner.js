wp.blocks.registerBlockType("blocktheme/banner", {
  title: "Banner",
  edit: EditComponent,
  save: SaveComponent,
});

function EditComponent() {
  return "";
}

function SaveComponent() {
  return <p>salam</p>;
}
