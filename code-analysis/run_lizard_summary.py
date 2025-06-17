import subprocess
import re

# 📁 Path to the local repository to analyze
repo_path = "path/to/your/repo"  # Replace with actual repo path


def run_lizard_and_print(repo_path):
    print(f"🔍 Running Lizard on: {repo_path}\n")

    # 🛠️ Run Lizard command and capture output
    result = subprocess.run(
        f'lizard "{repo_path}"',       # Run lizard on the target path
        shell=True,
        capture_output=True,
        text=True                      # Capture output as text instead of bytes
    )
    
    print("✅ Lizard analysis completed.\n")

    # ⚠️ Print stderr (e.g., warnings, but not fatal)
    if result.stderr.strip():
        print("⚠️ STDERR Output:\n", result.stderr)


    # 🔎 Regex to capture the final summary table line
    match = re.search(
        r"^\s*(\d+)\s+([\d.]+)\s+([\d.]+)\s+([\d.]+)\s+(\d+)\s+(\d+)\s+([\d.]+)\s+([\d.]+)",
        result.stdout,
        re.MULTILINE
    )

    # ✅ Extract summary metrics if available
    if match:
        summary = {
            "Total NLOC"   : int(match.group(1)),
            "Avg. NLOC"    : float(match.group(2)),
            "Avg. CCN"     : float(match.group(3)),
            "Avg. Token"   : float(match.group(4)),
            "Fun Cnt"      : int(match.group(5)),
            "Warning Cnt"  : int(match.group(6)),
            "Fun Rt"       : float(match.group(7)),
            "NLOC Rt"      : float(match.group(8)),
        }

        # 📊 Display the formatted summary
        print("📊 Lizard Code Complexity Summary")
        print("==================================")
        for key, value in summary.items():
            print(f"{key:13}: {value}")
        print("==================================\n")
    else:
        # 🚫 If summary is not found, print full output
        print("🚫 No summary data found in Lizard output.")
        print("🔎 Raw Output:\n", result.stdout)

# ▶️ Execute the function
if __name__ == "__main__":
    run_lizard_and_print(repo_path)
