# Laravel to .NET Migration Workspace

This folder contains a .NET 8 web application scaffold intended to host the migration of this Laravel codebase.

## What is included

- `TntBack/` ASP.NET Core project scaffold.
- `TntBack/Migration/LegacyFileManifest.json` generated manifest listing **every file** in the original repository and migration state.
- `TntBack/src/LegacyPort/...` generated C# placeholder class for each original PHP file to ensure one-to-one tracking of source files.
- `TntBack.csproj` content-link rules that include `config/`, `routes/`, `resources/`, and `public/` files into the .NET build output for reference during migration.

## Next steps

1. Replace generated placeholders with real EF Core models, services, and controllers.
2. Convert Blade views into Razor (`.cshtml`) views.
3. Migrate authentication, JWT handling, middleware, and repositories into ASP.NET Core equivalents.
4. Add unit/integration tests for migrated behavior.
