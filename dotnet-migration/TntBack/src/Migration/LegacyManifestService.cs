using System.Text.Json;

namespace TntBack.Migration;

public sealed class LegacyManifestService
{
    private readonly JsonElement _manifest;

    public LegacyManifestService(IWebHostEnvironment environment)
    {
        var path = Path.Combine(environment.ContentRootPath, "Migration", "LegacyFileManifest.json");
        var json = File.ReadAllText(path);
        _manifest = JsonSerializer.Deserialize<JsonElement>(json);
    }

    public JsonElement GetManifest() => _manifest;
}
